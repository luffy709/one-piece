<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index():View
    {
        return view("contact.index");
    }

    public function send(Request $request)
    {
        $request->validate([
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'message' => ['required', 'string'],
        ]);

        foreach (User::role(['super administrator', 'administrator', 'super moderator', 'moderator'])->get() as $user) {
            Notification::send($user, new ContactNotification($request->all()));
        }

        return redirect()->back();
    }
}
