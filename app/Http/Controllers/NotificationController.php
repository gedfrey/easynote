<?php

namespace App\Http\Controllers;

use App\Mail\NewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'person' => 'required|email',
            'body' => 'required'
        ]);

        Mail::to($request->subject)->send(new NewNotification);

        return view('success');

    }
}
