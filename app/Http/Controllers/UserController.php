<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
//        $users = User::whereNull('approved_at')->get();
        $users = User::where('admin','!=',true)->get();

        return view('register.users', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->withMessage('User approved successfully');
    }

    public function dissApprove($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => null]);

        return redirect()->route('admin.users.index')->withMessage('User dissapproved successfully');
    }

    public function errorOwner(){
        return view('error-ownership');
    }
}
