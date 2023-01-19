<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function availableJob()
    {
        return view('admin.available-job');
    }

    public function personJob()
    {
        return view('admin.person-job');
    }
}
