<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {

      $request->validate([
        'subject' => 'required',
          'name' => 'required',
          'email' => 'required|email',
          'content' => 'required',
          'captcha' => 'required|captcha',
      ]);

      $details = [
        'subject' => $request->subject,
        'name' => $request->name,
        'email' => $request->email,
        'content' => $request->content
      ];

      Mail::to('forfreelancing101@gmail.com')->send(new ContactMail($details));
      return redirect()->back()->with('message_sent', 'Your Mail Has Been Sent');

    }

    public function refreshCaptcha(){
      return response()->json(['captcha' =>captcha_img()]);
  }
}
