<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\UsersDemandsStars;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = Auth::user();
        $demands = UsersDemandsStars::where('response', '=', 0)->get();
        return view('admin.user.index', ['user' => $user, 'allusers' => $allusers = User::all(), 'demands' => $demands]);
    }

    public function show(User $user){
        return view('admin.user.show', ['user' => $user]);
    }

    public function accept(UsersDemandsStars $usersDemandsStars){
        if(!is_null($usersDemandsStars)){
            $user = $usersDemandsStars->user;
            $user->star = true;
            $user->save();
            $usersDemandsStars->response = true;
            $this->sendAccept($user);
            $usersDemandsStars->save();
            return Redirect::route('admin.user.show', ['user' => $user->id]);
        }

        return Redirect::back();
    }

    public function rejet(UsersDemandsStars $usersDemandsStars){
        if(!is_null($usersDemandsStars)){
            $user = $usersDemandsStars->user;
            $user->star = false;
            $user->save();
            $usersDemandsStars->response = true;
            $this->sendrejet($user);
            $usersDemandsStars->save();
            return Redirect::route('admin.user.show', ['user' => $user->id]);
        }

        return Redirect::back();
    }

    public function changeStatus(User $user){
        if(!is_null($user)){
            if($user->star == true){
                $user->star = false;
            }else{
                $user->star = true;
            }
            $user->save();
            return Redirect::route('admin.user.show', ['user' => $user->id]);
        }

        return Redirect::back();
    }

    public function blocked(User $user){
        if(!is_null($user)){
            $user->status = "blocked";
            $user->save();

            foreach ($user->publicationsAll as $p){
                $p->status = 'Blocked';
                $p->save();
            }

            foreach ($user->commentsAll as $c){
                $c->status = 'Blocked';
                $c->save();
            }
            return Redirect::route('admin.user.show', ['user' => $user->id]);
        }

        return Redirect::back();
    }

    public function authorize(User $user){
        if(!is_null($user)){
            $user->status = "success";
            $user->save();

            foreach ($user->publicationsAll as $p){
                $p->status = 'Success';
                $p->save();
            }

            foreach ($user->commentsAll as $c){
                $c->status = 'Success';
                $c->save();
            }
            return Redirect::route('admin.user.show', ['user' => $user->id]);
        }

        return Redirect::back();
    }

    private function sendAccept(User $user){
        $this->mailer->send('emails.acceptstar', ['user' => $user] ,function (Message $m) use ($user) {
            $m->from('esgi.athleteec@gmail.com', 'Athleteec');
            $m->to($user->email)->subject("Demande de personnalité");
        });
    }
    private function sendrejet(User $user){
        $this->mailer->send('emails.rejetstar', ['user' => $user] ,function (Message $m) use ($user) {
            $m->from('esgi.athleteec@gmail.com', 'Athleteec');
            $m->to($user->email)->subject("Demande de personnalité");
        });
    }


}
