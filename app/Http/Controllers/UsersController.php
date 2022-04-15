<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\OpenOrder;
use App\Profile_model;
use App\Services\GlobalService;
use App\User;
use App\Utilities\TokenUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
{
    public function index()
    {
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();

        return view('users.login_register', compact('order', 'countCart'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
        ]);

        $input_data = $request->all();
        $input_data['password'] = Hash::make($input_data['password']);
        User::create($input_data);

            
        $tokenVerify = TokenUtil::unique('users', 'email_token', 64);
        // $user->reset_token = $tokenVerify;
        // $user->save();

        //sending email
        $subject = 'Verifikasi Email Anda';
        $data = [
            'name' => $request->name ?? '',
            'verification' => (env('APP_ENV') == 'local') ? env('LOCAL_SS_URL') .'/verification-email?token=' . $tokenVerify : env('SS_URL') .'/verification-email?token=' . $tokenVerify
        ];

        Mail::send(new SendEmail($request->email, $subject, 'mailer.registration', $data));

        return back()->with('message','Registered already!');
    }
    public function login(Request $request){
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            return redirect('/');
        }else{
            return back()->with('message','Account is not Valid!');
        }
    }
    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
    public function account(){
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();

        return view('users.account',compact('countries','user_login', 'order', 'countCart'));
    }
    public function updateprofile(Request $request,$id){
        $this->validate($request,[
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'mobile'=>'required',
        ]);
        $input_data=$request->all();
        DB::table('users')->where('id',$id)->update(['name'=>$input_data['name'],
            'address'=>$input_data['address'],
            'city'=>$input_data['city'],
            'state'=>$input_data['state'],
            'country'=>$input_data['country'],
            'pincode'=>$input_data['pincode'],
            'mobile'=>$input_data['mobile']]);
        return back()->with('message','Update Profile already!');

    }
    public function updatepassword(Request $request,$id){
        $oldPassword=User::where('id',$id)->first();
        $input_data=$request->all();
        if(Hash::check($input_data['password'],$oldPassword->password)){
            $this->validate($request,[
               'newPassword'=>'required|min:6|max:12|confirmed'
            ]);
            $new_pass=Hash::make($input_data['newPassword']);
            User::where('id',$id)->update(['password'=>$new_pass]);
            return back()->with('message','Update Password Already!');
        }else{
            return back()->with('oldpassword','Old Password is Inconrrect!');
        }
    }

    public function resetPassword()
    {
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();

        return view('users.resetpassword', compact('order', 'countCart'));
    }

    public function resetSandi(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|string|email',
        ]);

        $email = $request->email;

        $user = User::where('email', $email)->first();
        if ($user == null) {
            return back()->with('message', 'Akun tidak ditemukan');
        }
        
        $tokenVerify = TokenUtil::unique('users', 'reset_token', 64);
        $user->reset_token = $tokenVerify;
        $user->save();

        //send email forgot password
        $subject = "Reset Password";
        $data = [
            'user' => $user,
            'token' => (env('APP_ENV') == 'local') ? env('LOCAL_SS_URL') .'/change-password?token=' . $tokenVerify : env('SS_URL') .'/change-password?token=' . $tokenVerify
        ];
    
        Mail::send(new SendEmail($user->email, $subject, 'mailer.forgotpassword', $data));
        return back()->with('message', 'request berhasil!, Periksa email anda');

    }

    public function changePassword()
    {
        $order = GlobalService::openOrder();
        $countCart = GlobalService::countCart();

        return view('users.change_password', compact('order', 'countCart'));
    }

    public function gantiSandi(Request $request) 
    {
        $this->validate($request, [
            'newPassword'     => 'required|min:6|max:12',
            'confirmPassword' => 'required|min:6|max:12',
        ]);

        $token = $request->token;
        $user = User::where('reset_token', $token)->first();
        if ($user == null) {
            return back()->with('message', 'token expired');
        }

        if ($request->newPassword != $request->confirmPassword) {
            return back()->with('message', 'Password tidak sesuai');
        }

        $user->reset_token = null;
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return back()->with('message', 'Password Berhasil Diganti');
    }
}
