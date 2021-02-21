<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function store()
    {
        
        $data = request()->validate([

            'nom' => ['required','string'],
            'prenom' => ['required','string'],
            'email' => ['required','email'],
            'message' => ['required','string'],

        ]);
        
        $var = new Controller();
        $var->email;

        Mail::to($var->email)->send(new ContactMail($data));

        return redirect('contact')->with('Contacter','Votre Message à bien été envoyé Merci.');
    }
}
