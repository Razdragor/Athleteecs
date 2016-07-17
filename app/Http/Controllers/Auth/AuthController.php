<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\UsersNewsletters;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\ActivationService;
use Carbon\Carbon;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $activationService;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->activationService = $activationService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users|confirmed',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $tz = "Europe/Paris";
        $birthday = Carbon::createFromDate($data['year'], $data['month'], $data['day'], $tz);

        return User::create(array(
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => $data['password'],
            'sexe' => $data['sexe'],
            'status' => 'validation email',
            'birthday' => $birthday
        ));
    }

    public function register(Request $request){

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator);
        }


        $user = $this->create($request->all());
        if($request->get('newsletter')){
            $user->newsletter = true;
            $user->save();
            UsersNewsletters::create(array(
                'email' => $user->email,
                'active' => true
            ));
        }
        if(isset($user)) {
            $roleUser = Role::find(2);
            if(!$user->hasRole($roleUser->name)){
                $user->attachRole($roleUser);
            }
        }

        $this->activationService->sendActivationMail($user);
        return redirect('/login')->with('status', 'Nous vous avons envoyé un mail d\'activation sur votre boite mail');
    }

    public function activateUser($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }


}
