<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Formation;
use App\FormationVideo;

class FormationController extends Controller
{
    
    public function index()
    {
        
        $lang = app()->getLocale();
        //$formations = DB::table('formations')->orderBy('created_at','DESC');
        $formations = Formation::all()->where('langue',$lang); 
        $formationVideos = FormationVideo::all() ;
        
        return view('formation.formation',compact('formations','formationVideos'));
    }
    
    public function store()
    {
        /* verification des donnees */
        $data = request()->validate([
 
            'TitreFormation' => ['required','string'],
            'DescriptionFormation' => ['required','string'],
            'ImageFormation' => ['required','image'],

        ]);

        
            /* copie du chemin des images dans le dossier uploads */
            $imagePath = request('ImageFormation')->store('uploads','public');

        $str = new GoogleTranslate('fr');

        Formation::create([
            'langue' => 'fr',
            'titre' => $str->translate($data['TitreFormation']),
            'description' => $str->translate($data['DescriptionFormation']),
            'image' => $imagePath,
        ]);
            
        $str = new GoogleTranslate('en');

        Formation::create([
            'langue' => 'en',
            'titre' => $str->translate($data['TitreFormation']),
            'description' => $str->translate($data['DescriptionFormation']),
            'image' => $imagePath,
        ]);
        
        return redirect('admin')->with('formation','la formation a bien été ajouté.');
    }

    public function show(Formation $formations)
    {
        return view('formation.formation-details',compact('formations'));
    }

    public function delete(Formation $formations)
    {
        
        $formations->delete();

        return redirect('admin');
    }

    public function modify(Formation $formations)
    {
         

        $service_update=0;
        $formation_update=1;
        $temoignage_update=0;
        $article_update=0;
        $project_update=0;
        $slide_update=0;
        $formationVideo_update=0;
        $formationVideoDetails_update=0;

        return view('modify',compact('formations','Service','service_update','project_update','formation_update',
        'temoignage_update','article_update','slide_update','formationVideo_update','formationVideoDetails_update'));
        
    }

    public function update(Formation $formations)
    {
        $data = request()->validate([
 
            'TitreFormation' => ['required','string'],
            'DescriptionFormation' => ['required','string'],
            'ImageFormation' => ['image'],

        ]);
        
            if(isset($data['ImageFormation']))
            {
                /* copie du chemin des images dans le dossier uploads */
             $imagePath = request('ImageFormation')->store('uploads','public');
             
                $update_formation = [
                
                    'titre' => $data['TitreFormation'],
                    'description' => $data['DescriptionFormation'],
                    'image' => $imagePath,
                ];

                $formations->update($update_formation);

             return redirect('admin');
            }
         
        
        $update_formation = [
            
            'titre' => $data['TitreFormation'],
            'description' => $data['DescriptionFormation'],
        ];
        
        $formations->update($update_formation);
        
        return redirect()->route('welcome');
    }
}
