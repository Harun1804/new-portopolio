<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($slug = null)
    {
        $user = User::with('sosmeds','jobs','about')->whereSlug($slug)->first();
        return view('homepage.welcome', compact(['user']));
    }

    public function show($id)
    {
        return view('homepage.project-detail');
    }
}
