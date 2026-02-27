<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\sendForgotPassword;
use App\Models\Admin;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    public function loginShow(){
        return view('principal.auth.login');
    }

    public function loginProcess(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'សូមបញ្ចូលអ៊ីមែល។',
            'email.email' => 'សូមបញ្ចូលអ៊ីមែលឲ្យបានត្រឹមត្រូវ។',
            'password.required' => 'សូមបញ្ចូលពាក្យសម្ងាត់។',   
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me') ? true : false;

        if(Auth::guard('admin')->attempt($credentials, $remember)){
            return "Login successful";
        }else{
            return back()->with(['error' => 'អ៊ីមែល ឬ ពាក្យសម្ងាត់មិនត្រឹមត្រូវ។']);
        }     
    }

    public function sendEmail(){
        return view('principal.auth.send_email');
    }

    public function sendEmailProcess(Request $request){
         $request->validate([
            'email' => 'required|email|exists:admins,email'
        ],[
            'email.required' => 'សូមបញ្ចូល Email របស់អ្នក',
            'email.email' => 'សូមបញ្ចូល Email អោយបានត្រឹមត្រូវ',
            'email.exists' => 'Email ពុំមាននៅក្នុងប្រព័ន្ធ',
        ]);

        // generate code 
        $code = mt_rand(000000,999999);

        // generate token 
        $token = hash('sha256', random_bytes(30));

        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            [
                     'token' => $token,
                     'code' => $code, 
                     'expires_at' => now()->addMinutes(15)
                ]
        );

        $admin = Admin::where('email', $request->email)->first();


        $data = [
            'name' => $admin->last_name,
            'code' => $code,
            'token' => $token,
            'email' => $request->email
            
        ];

        Mail::to($request->email)->send(new sendForgotPassword($data));
        

       
        return redirect()->route('admin.code.verify.show',[
            'token' => $token
        ])->with('success','ការស្នើរសុំលេខកូដរបស់អ្នកត្រូវបានជោគជ័យ សូមមើលក្នុង Gmail');
    }
    public function showCodeVerify(){
        return view('principal.auth.code_verify');
    }
    public function showResetPassword(){
        return view('principal.auth.new_password');
    }
}
