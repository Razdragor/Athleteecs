<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests;
 

class ObligatoryController extends Controller
{
    public function confidentialite()
    {
        return view('front.obligatoire.confidentialite');
    }

    public function mentionslegales()
    {
        return view('front.obligatoire.mentionslegales');
    }
       
}
