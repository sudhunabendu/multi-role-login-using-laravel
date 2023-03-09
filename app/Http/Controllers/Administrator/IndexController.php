<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->back();
        }
        return view('Administrator.login');
    }

    // public function dologin(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|max:255',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     // echo 'ok';
    //     // die();

    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('dashboard')
    //             ->withSuccess('You have Successfully loggedin');
    //         // echo 'ok';
    //     }

    //     // echo 'not ok';

    //     return redirect("login")->withErrors('Oppes! You have entered invalid credentials');
    // }

    public function dologin1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Attempt to log the user in
        if (!Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors(['status' =>  'Incorrect username or password.']);
        }

        $user = Auth::guard('user')->user();
        if ($user->role_id == 1) {
            return redirect()->route('user.dashboard');
        } elseif ($user->role_id == 2) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.page');
    }

    public function SuperDashboard()
    {
        if (Auth::guard('user')->check()) {
            return view('Administrator.superDashboard.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function AdminDashboard()
    {
        if (Auth::guard('user')->check()) {
            return view('Administrator.adminDashboard.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('login');
    }
}
