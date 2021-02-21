<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function store()
    {
        $data = request()->validate([
 
            'email' => ['required','email','unique:newsletters'],

        ]);

        Newsletter::create([
            
            'email' => $data['email'],
        ]);
    
        return redirect()->route('welcome');
    }
}
