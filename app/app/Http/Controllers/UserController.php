<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $users = User::where('is_admin', false)->where('email_verified_at', null)->get();

        return view('dashboard', compact('users'));
    }

    // LOCATION: app/Http/Controllers/UserController.php
    public function approve(int $id)
    {
        $user = User::findOrFail($id);
        // make and even
        event(new Registered($user));

        return redirect()->back()->with('status', 'An email is send to user, to approve his profile');
    }
}
