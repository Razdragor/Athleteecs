<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if(Auth::user()->getnotificationstrue->count() > 0)
        {
            $notifavalider = Auth::user()->getnotificationstrue;

            foreach($notifavalider as $notif)
            {
                $notif->afficher = false;
                $notif->save();
            }
        }

        return view('front.notifications');
    }

    public function see(Notifications $notification){
        if(Request::ajax()){
            $notification->afficher = false;
            $notification->save();
        }
    }

}
