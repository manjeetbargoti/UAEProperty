<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Admin Login Function
    public function adminLogin(Request $request, $guard = null)
    {
        // $userData = Auth::user();

        if (Auth::guard($guard)->check()) {
            // Session::put('Auth', $userData['email']);
            return redirect('/admin/dashboard');
        }

        if ($request->isMethod('post')) {
            $data = $request->input();
            // echo "<pre>"; print_r($data); die;
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('/admin/dashboard')->with('flash_message_success', 'Login Successfull!');
            } else {
                return redirect('/admin')->with('flash_message_error', 'Invelid Email Address or Password!');
            }
        }


        return view('auth.login');
    }

    // Dashboard function
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Admin/User logout
    public function logout()
    {
        Auth::logout();
        Session::forget('Auth');
        return redirect()->route('login')->with('flash_message_success', 'Logged out Successfully!');
    }
}
