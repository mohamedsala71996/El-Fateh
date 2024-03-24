<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    public function login(){
        return view('admin.login');
    }

    public function siginedin(){
        return view('admin.index');
    }
    public function signupView(){
        return view('admin.signup');
    }

    public function adminSignup(Request $request) {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|string|max:20|unique:customers|regex:/^[0-9]{10,20}$/',
            'password' => 'required|string|min:8',
        ]);
    
        // Proceed with saving data if validation passes
        $admin = Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->first_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' =>  Hash::make($request->password),
        ]);
        Auth::guard('admin')->loginUsingId($admin->id);
        // toastr()->success('تم تسجيل الدخول بنجاح ');

        return redirect()->route('dashboard');
    }
    

    public function adminSignin(Request $request) {
        // dd($request->all());

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password ])) {

            // toastr()->success('تم تسجيل الدخول بنجاح ');

            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'فشل تسجيل الدخول، يرجى التحقق من البريد الإلكتروني وكلمة المرور');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        // toastr()->success('تم تسجيل الخروج بنجاح ');
        return redirect()->route('login');
        
    }

}