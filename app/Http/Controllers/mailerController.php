<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\appointment;
use Illuminate\Support\Facades\App;

class mailerController extends Controller
{
    public   function SendMail(Request $request)
    {
      $appoint=  appointment::create([
            'customer_email' => $request->customer_email,
        ]);
        $email = $request->customer_email;
        Mail::to($email)->send(new SendMail($email));
    }
}
