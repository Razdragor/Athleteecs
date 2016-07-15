<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = Auth::user();
        return view('admin.user.index', ['user' => $user, 'allusers' => $allusers = User::all()]);
    }

    public function show(User $user){
        return view('admin.user.show', ['user' => $user]);
    }


}
