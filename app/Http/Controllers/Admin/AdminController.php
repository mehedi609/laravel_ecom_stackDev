<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {

//            $request->validate([
//                'email' => 'required|email|max:255',
//                'password' => 'required',
//            ]);

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
            $custom_messages = [
                'email.required' => 'Email is required',
                'email.email' => 'Please provide a valid email',
                'password.required' => 'Password is required',
            ];

            $this->validate($request, $rules, $custom_messages);

            $data = $request->all();

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect()->route('admin.dashboard');
            } else {
                Session::flash('error_message', 'Invalid Credentials! Try again!');
                return redirect()->route('admin.login');
            }
        }

        return view('admin.admin_login');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
