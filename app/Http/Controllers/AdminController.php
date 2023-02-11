<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function job()
    {
        return view('admin.available-job');
    }

    public function sosmed()
    {
        return view('admin.sosmed');
    }

    public function skill()
    {
        return view('admin.skill');
    }

    public function user()
    {
        return view('admin.users');
    }
}
