<?php
namespace App;


use Carbon\Carbon;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;

class ActivationRepository extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_activations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'activated', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function createActivation($user)
    {

        $activation = $this->getActivation($user);

        if (!$activation) {
            return $this->createToken($user);
        }
        return $this->regenerateToken($user);

    }

    private function regenerateToken($user)
    {

        $token = $this->getToken();
        $this->update([
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    private function createToken($user)
    {
        $token = $this->getToken();
        $this->create([
            'user_id' => $user->id,
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    public function getActivation($user)
    {
        return $this->where('user_id', $user->id)->first();
    }


    public function getActivationByToken($token)
    {
        return $this->where('token', $token)->first();
    }

    public function deleteActivation($token)
    {
        $this->where('token', $token)->delete();
    }

}