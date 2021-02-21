<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Services;
use App\Icone;

class ServiceController extends Controller
{
    public function index()
    {
        
        $lang = app()->getLocale();
        $services = Services::with('icone')->where('langue','=',$lang)->get();
        return view('service.service',compact('services'));
    }

    public function store()
    {
        /* verification des donnees */
        $data = request()->validate([
 
            'NomService' => ['required','string'],
            'DescriptionService' => ['required','string'],
            'icone' => ['required','string'],
            
        ]); 
        
        // traduction
        $str = new GoogleTranslate('fr');

        Services::create([
            'langue' => 'fr',
            'nom' => $str->translate($data['NomService']),
            'description' => $str->translate($data['DescriptionService']),
            'icone_id' => $str->translate($data['icone']),
        ]);

        $str = new GoogleTranslate('en');

        Services::create([
            'langue' => 'en',
            'nom' => $str->translate($data['NomService']),
            'description' => $str->translate($data['DescriptionService']),
            'icone_id' => $str->translate($data['icone']),
        ]);
        

        return redirect('admin')->with('service','le service a bien été ajouté.');;
    }

    public function modify(Services $services)
    {
        

        $service_update=1;
        $formation_update=0;
        $temoignage_update=0;
        $article_update=0;
        $project_update=0;
        $slide_update=0;
        $formationVideo_update=0;
        $formationVideoDetails_update=0;

        $icones = Icone::all();

        return view('modify',compact('services','icones','Service','service_update','project_update','formation_update',
        'temoignage_update','article_update','slide_update','formationVideo_update','formationVideoDetails_update'));
        
    }

    public function delete(Services $services)
    {
        
        $services->delete();

        return redirect('admin');
    }

    public function update(Services $service)
    {
        $data = request()->validate([
 
            'NomService' => ['required','string'],
            'DescriptionService' => ['required','string'],
            'icone' => ['required','string'],

        ]);
        
        $update_service = [
            
            'nom' => $data['NomService'],
            'description' => $data['DescriptionService'],
            'icone_id' => $data['icone'],
        ];
        
        $service->update($update_service);
        
        return redirect()->route('welcome');
    }

}
