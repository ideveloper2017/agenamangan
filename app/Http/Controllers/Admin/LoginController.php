<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {


        $user = new User();
        if ($request->cofirm != $request->password) {
            return redirect('register')->with('error', 'Bu parol yaroqsiz!!!');

        }
        $user->name = $request->name_a;

        $user->email = $request->email_a;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('login')->with('success', 'Royxatga olish mofaqiyatli');
    }

    public function logout(): \Illuminate\Http\RedirectResponse

    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login');
        }
        return redirect()->back()->with('success', 'You are not logged in');

    }
}
