<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests;
 

class ConfidentialiteController extends Controller
{
    public function index()
    {
        return view('front.confidentialite.index');
    }
       
}
