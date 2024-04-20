<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Organiser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    public function showForgotForm(){
        return view('dashboard.admin.forgot');
    }
    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
              'email'=>$request->email,
              'token'=>$token,
              'created_at'=>Carbon::now(),
        ]);

        $action_link = route('user.reset.password.form',['token'=>$token,'email'=>$request->email]);
        $body = "We are received a request to reset the password for <b>Your app Name </b> account associated with ".$request->email.". You can reset your password by clicking the link below";

        Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
                $message->from('noreply@example.com','Your App Name');
                $message->to($request->email,'Your name')
                        ->subject('Reset Password');
        });

       return back()->with('success', 'We have e-mailed your password reset link!');
   }

   public function showResetForm(Request $request, $token = null){
       return view('dashboard.user.reset')->with(['token'=>$token,'email'=>$request->email]);
   }

   public function resetPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
        ]);

        $check_token = DB::table('password_reset_tokens')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{

            User::where('email', $request->email)->update([
                'password'=> Hash::make($request->password)
                ]);

                DB::table('password_reset_tokens')->where([
                    'email'=>$request->email
                ])->delete();

            return redirect()->route('user.login')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
        }
   }
}
