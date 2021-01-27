<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login');
            }
        }

        return view('admin.admin_login');
    }
}
