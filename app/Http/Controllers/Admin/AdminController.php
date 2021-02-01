<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Toastr;

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
                Session::flash('success_message', 'Welcome back '.Str::ucfirst(Auth::guard('admin')->user()->name));
                return redirect()->route('admin.dashboard');
            } else {
//                Session::flash('error_message', 'Invalid Credentials! Try again!');
                Toastr::error('', 'Invalid Credentials! Try again!');
                return redirect()->route('admin.login');
            }
        }

        return view('admin.admin_login');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function settings()
    {
        return view('admin.admin_settings');
    }

    public function update_password(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            $this->validate($request, ['password' => 'required | string | min:8 | confirmed']);

            $admin = Admin::find(Auth::guard('admin')->user()->id);
            $admin->password = Hash::make($data['password']);
            $admin->save();
            Toastr::success('', 'Password is Changed successfully');
            return redirect()->back();
        } else {
            Toastr::warning('', 'Current Password is incorrect');
        }

        return redirect()->back();
    }

    public function check_current_password(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            echo "true";
        } else {
           echo "false";
        }
    }

    public function update_admin_details(Request $request)
    {
        if ($request->isMethod('POST')) {
            $rules = [
                'admin_name' => 'required',
                'admin_mobile' => 'required | numeric',
            ];

            $this->validate($request, $rules);

            $data = $request->all();

            $admin = Admin::find(Auth::guard('admin')->user()->id);
            $admin->name = $data['admin_name'];
            $admin->mobile = $data['admin_mobile'];
            $admin->name = $data['admin_name'];
            $admin->save();

            Toastr::success('', 'Admin Details is Updated successfully');

            return redirect()->back();
        }

        return view('admin.update_admin_details');
    }
}
