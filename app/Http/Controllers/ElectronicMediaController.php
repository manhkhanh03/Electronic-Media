<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectronicMediaController extends Controller
{
    public function showHome() {
        return view('home');
    }

    public function showLogin() {
        return view('login');
    }

    public function showSignup() {
        return view('signup');
    }

    public function showIndex() {
        return view('index');
    }
}
