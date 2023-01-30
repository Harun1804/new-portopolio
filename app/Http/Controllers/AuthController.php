<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginProcess(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return $this->redirection(Auth::user()->role);
        }

        return redirect()->back()->with('error','Email & Password does not match');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }

    private function redirection($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
                break;

            default:
                return redirect()->route('user.dashboard');
                break;
        }
    }
}
