<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\FormationMail;
use App\Mail\StageMail;
use App\Formation;

class DemandeController extends Controller
{
    public function indexF()
    {
        $formations = formation::all();
        return view('form.form-formation',compact('formations'));
    }

    public function indexS()
    {
        $formations = formation::all();
        return view('form.form-stage',compact('formations'));
    }

    public function stage()
    {
        
        /* verification des donnees */
        $data = request()->validate([
 
            'nom' => ['required','string'],
            'prenom' => ['required','string'],
            'email' => ['required','email'],
            'adresse' => ['required','string'],
            'formation' => ['required','string'],
            'demande' => ['required','mimes:pdf'],
            'numero' => ['required','integer'],

        ]);
        
        $fichier = request('demande')->store('DemandeStage','public');
        $var = new Controller();
        $var->email;

        Mail::to($var->email)->send(new StageMail($data, $fichier));

        return redirect()->route('welcome');
    }

    public function formation()
    {
        /* verification des donnees */
        $data = request()->validate([
 
            'nom' => ['required','string'],
            'prenom' => ['required','string'],
            'email' => ['required','email'],
            'adresse' => ['required','string'],
            'formation' => ['required','string'],
            'numero' => ['required','integer'],

        ]);
        $var = new Controller();
        $var->email;
        Mail::to($var->email)->send(new FormationMail($data));

        return redirect()->route('welcome');
    }
}
