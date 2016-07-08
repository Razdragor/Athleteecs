<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = Auth::user();
        return view('admin.users', ['user' => $user, 'allusers' => $allusers = User::all()]);
    }


}
