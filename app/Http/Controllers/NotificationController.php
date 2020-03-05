<?php

namespace App\Http\Controllers;

use App\Mail\NewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{

    public function view()
    {
        return view('form-contact');
    }


    public function send(Request $request)
    {

        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6LepAt8UAAAAAIehm0RHsVxgMFXEE5GE6u9MjEVJ';
        $recaptcha_response = $request->recaptcha_response;
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);

        if($recaptcha->success && $recaptcha->score >= 0.7){
            $request->validate([
                'subject' => 'required|max:255',
                'email' => 'required|email',
                'body' => 'required|min:10'
            ]);
            Mail::to(env('APP_EMAIL'))->queue(new NewNotification($request->email,$request->subject,$request->body));

            return view('success');
        }

        return view('bot');

    }
}
