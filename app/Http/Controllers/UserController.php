<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function about()
    {
        return view('user.about');
    }

    public function sosmed()
    {
        return view('user.sosmed');
    }

    public function skill()
    {
        return view('user.skill');
    }

    public function portopolio()
    {
        return view('user.portopolio');
    }

    public function service()
    {
        return view('user.service');
    }

    public function education()
    {
        return view('user.education');
    }

    public function workExperience()
    {
        return view('user.work-exp');
    }
}
