<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000'
        ]);

        Mail::raw(
            "Name: ".$request->name."\n".
            "Email: ".$request->email."\n\n".
            "Message:\n".$request->message,
            function($msg) use ($request){
                $msg->to("rnrakeshnagar7742@gmail.com")
                    ->replyTo($request->email, $request->name)
                    ->subject("Portfolio Contact from ".$request->name);
            }
        );

        return back()->with('success','Message Sent Successfully!');
    }
}
