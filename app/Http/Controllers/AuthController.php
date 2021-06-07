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
			'name' => 'required',
			'email' => 'required|email|unique:admins',
			'password' => 'required|min:5|max:12'
		]);

		$admin = new Admin();
		$admin->name = $request->name;
		$admin->email = $request->email;
		$admin->password = Hash::make($request->password);

		$save = $admin->save();

		if (!$save) {
			return back()->with('fail', 'Something went wrong.');
		}
		return back()->with('success', 'User successfully registered.');
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
			return redirect('dashboard');
		}
		return back()->with('fail', 'Incorrect password');
	}

	public function dashboard()
	{
		return view('dashboard');
	}

	public function logout()
	{
		if (session()->has('loggedUser')) {
			session()->pull('loggedUser');
			return redirect('auth/login');
		}
	}
}
