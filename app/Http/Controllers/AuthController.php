<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function save(Request $request)
    {
        // TODOS:
        // 1. Add try-catch
        // 2. Add validation in validation class
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:12'
        ]);

        $admin = new Admin();
        $admin->first_name = $request->firstName;
        $admin->last_name = $request->lastName;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $save = $admin->save();

        if (!$save) {
            return back()->with('fail', 'Something went wrong.');
        }

        $request->session()->put('loggedUser', $admin->id);
        return redirect('home');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'No user found with this email');
        }
        if (Hash::check($request->password, $userInfo->password)) {
            $request->session()->put('loggedUser', $userInfo->id);
            return redirect('home');
        }
        return back()->with('fail', 'Incorrect password');
    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->pull('loggedUser');
            return redirect('auth/login');
        }
    }
}
