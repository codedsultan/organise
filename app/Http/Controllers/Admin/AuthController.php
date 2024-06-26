<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
        /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:admin,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is exists already'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('user')->attempt($creds) ){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
