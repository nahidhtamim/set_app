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
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'captcha' => 'required|captcha',
      ]);

      $details = [
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'address' => $request->address,
          'content' => $request->content,
      ];

      Mail::to('info@de-set.com')->send(new ContactMail($details));
      return redirect()->back()->with('message_sent', 'Your Mail Has Been Sent');

  }

    public function refreshCaptcha(){
      return response()->json(['captcha' =>captcha_img()]);
  }
}
