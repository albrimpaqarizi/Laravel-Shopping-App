<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index(){
        return view('pages.contact');
    }

    public function send(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::send(new ContactMail($data));

        return redirect('contact')
            ->with('message', 'Thanks for your message. We\'ll be in touch.');
    }
}
