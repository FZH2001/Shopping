<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Shop;

class MailController extends Controller
{
    //
    public function sendMail(){
        Mail::to('personneuser1234@gmail.com')->send(new Shop());
        return redirect('cartlist')->with('message','We have sent a request confirmation link, please check your email.');
    }
}
