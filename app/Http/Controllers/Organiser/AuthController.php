<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Organiser;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
           /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:organisers',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = new Organiser();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();
        $last_id = $user->id;

        $token = $last_id.hash('sha256', Str::random(120));
        $verifyURL = route('organiser.verify',['token'=>$token,'service'=>'Email_verification']);

        VerifyUser::create([
            'user_id'=>$last_id,
            'user_type' => Organiser::class,
            'token'=>$token,
        ]);

        $message = 'Dear <b>'.$request->name.'</b>';
        $message.= 'Thanks for signing up, we just need you to verify your email address to complete setting up your account.';

        $mail_data = [
            'recipient'=>$request->email,
            'fromEmail'=>$request->email,
            'fromName'=>$request->name,
            'subject'=>'Email Verification',
            'body'=>$message,
            'actionLink'=>$verifyURL,
        ];

        Mail::send('email-template', $mail_data, function($message) use ($mail_data){
                   $message->to($mail_data['recipient'])
                           ->from($mail_data['fromEmail'], $mail_data['fromName'])
                           ->subject($mail_data['subject']);
        });

        if($save){
            return redirect()->back()->with('success','You need to verify your account. We have sent you an activation link, please check your email.');
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
  }

    public function check(Request $request){

        $request->validate([
           'email'=>'required|email|exists:organisers,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email does not exist'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('organiser')->attempt($creds) ){
            return redirect()->route('organiser.home');
        }else{
            return redirect()->route('organiser.login')->with('fail','Incorrect Credentials');
        }
    }

    public function logout(){
        Auth::guard('organiser')->logout();
        return redirect('/organiser/');
    }

    public function verify(Request $request){
        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->with('user')->first();

        if(!is_null($verifyUser)){
            $user = $verifyUser->user;

            if($user->email_verified_at === null){
                $verifyUser->user()->update(['email_verified_at' => now()]);
                // $verifyUser->delete();
                return redirect()->route('organiser.login')->with('info','Your email is verified successfully. You can now login')->with('verifiedEmail', $user->email);
            }else{
                 return redirect()->route('organiser.login')->with('info','Your email is already verified. You can now login')->with('verifiedEmail', $user->email);
            }
        }
    }
    public function verifyEmail (EmailVerificationRequest $request) {
        dd();
        $request->fulfill();
        dd();
        return redirect()->route('organiser.home');
    }

    public function verification (Request $request) {

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
