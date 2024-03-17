<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function home(){
        return view('navbar.home');
    }
}
