<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class NavController extends Controller
{
    public function goToLanding(){
    	return view('pages.landing');
    }
}
