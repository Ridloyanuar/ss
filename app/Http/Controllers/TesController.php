<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Utilities\TokenUtil;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;


class TesController extends Controller
{
    
    public function sendMailTes()
    {
        // dd(Config::get('mail'));
        $tokenVerify = TokenUtil::unique('users', 'email_token', 64);

        $subject = 'Verifikasi Email Anda';
        $data = [
            'name' => 'ridlo' ?? '',
            'verification' => (env('APP_ENV') == 'local') ? env('LOCAL_SS_URL') .'/verification-email?token=' . $tokenVerify : env('SS_URL') .'/verification-email?token=' . $tokenVerify
        ];

        Mail::send(new SendEmail('ridloyanuar@gmail.com', $subject, 'mailer.registration', $data));

        return response('success', 200);
    }

    public function pass() {
        return Hash::make('adminsayursembalun');
    }
}
