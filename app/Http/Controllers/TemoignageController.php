<?php
 
namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;
use App\Temoignage;

class TemoignageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    { 
        /* verification des donnees */
        $data = request()->validate([
 
            'nom' => ['required','string'],
            'entreprise' => ['required','string'],
            'temoignage' => ['required','string'],
            'PhotoClient' => ['image'],

        ]);

        

        if( isset($data['PhotoClient']) )
        {
            /* copie du chemin des images dans le dossier uploads */
            $imagePath = request('PhotoClient')->store('uploads','public');

            
            $str = new GoogleTranslate('fr');
            Temoignage::create([

                'langue' => 'fr',
                'nom' => $str->translate($data['nom']),
                'entreprise' => $data['entreprise'],
                'temoignage' => $str->translate($data['temoignage']),
                'image' => $imagePath,
            ]);

            $str = new GoogleTranslate('en');
            Temoignage::create([

                'langue' => 'en',
                'nom' => $str->translate($data['nom']),
                'entreprise' => $data['entreprise'],
                'temoignage' => $str->translate($data['temoignage']),
                'image' => $imagePath,
            ]);

        }
        else{
            
            $var = 'DefaultAvatar/avatar.jpg';
            $str = new GoogleTranslate('fr');
            Temoignage::create([
                
                'langue' => 'fr',
                'nom' => $data['nom'],
                'entreprise' => $data['entreprise'],
                'temoignage' => $str->translate($data['temoignage']),
                'image' => $var,
            ]);

            $str = new GoogleTranslate('en');
            Temoignage::create([
                
                'langue' => 'en',
                'nom' => $data['nom'],
                'entreprise' => $data['entreprise'],
                'temoignage' => $str->translate($data['temoignage']),
                'image' => $var,
            ]);

        }
    
        return redirect()->route('welcome');
    }


    public function delete(Temoignage $temoignages)
    {
        
        $temoignages->delete();

        return redirect('admin');
    }

    public function modify(Temoignage $temoignages)
    {
        $service_update=0;
        $formation_update=0;
        $temoignage_update=1;
        $article_update=0;
        $project_update=0;
        $slide_update=0;
        $formationVideo_update=0;
        $formationVideoDetails_update=0;

        return view('modify',compact('temoignages','service_update','project_update','formation_update',
        'temoignage_update','article_update','slide_update','formationVideo_update','formationVideoDetails_update'));
        
    }

    public function update(Temoignage $temoignage)
    {
        $data = request()->validate([
 
            'nom' => ['required','string'],
            'entreprise' => ['required','string'],
            'temoignage' => ['required','string'],
            'PhotoClient' => ['image'],

        ]);

        
            if(isset($data['PhotoClient']))
            {
                /* copie du chemin des images dans le dossier uploads */
             $imagePath = request('PhotoClient')->store('uploads','public');
             
                $update_temoignage = [
                
                    'nom' => $data['nom'],
                    'entreprise' => $data['entreprise'],
                    'temoignage' => $data['temoignage'],
                    'image' => $imagePath,
                ];
                $temoignage->update($update_temoignage);

                return redirect()->route('welcome');
            }
            
        
            $update_temoignage = [
                
                'nom' => $data['nom'],
                'entreprise' => $data['entreprise'],
                'temoignage' => $data['temoignage'],
            ];

            $temoignage->update($update_temoignage);
        
        return redirect()->route('welcome');
    }
}
