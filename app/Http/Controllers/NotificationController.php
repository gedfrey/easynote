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
//        dd($request);
        $request->validate([
            'subject' => 'required|max:255',
            'email' => 'required|email',
            'body' => 'required|min:10'
        ]);
//
        Mail::to($request->email)->queue(new NewNotification($request->email,$request->subject,$request->body));

        return view('success');

    }
}
