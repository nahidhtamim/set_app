<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
          'email' => 'required|email',
          'subject' => 'required',
          'name' => 'required',
          'content' => 'required',
        ]);

        $data = [
          'subject' => $request->subject,
          'name' => $request->name,
          'email' => $request->email,
          'content' => $request->content
        ];
        

        Mail::send('emails.ContactMail', $data, function($message) use ($data) {
          $message->to('forfreelancing101@gmail.com')
          ->subject($data['subject']);
        });

        return back()->with(['status' => 'Email Successfully Sent!']);
    }
}
