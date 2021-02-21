<?php

namespace App\Http\Controllers;


use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\FormationVideo;
use App\video;

class FormationVideoController extends Controller
{ 
    public function index1(FormationVideo $formationVideo)
    {
        /* permet de generer un mot de passe */
        $password = str_random(18);
        // dd($pass);
        
        Video::create([
            'PasswordVideo' => $password,
        ]);

        return view('video.PasswordVideo',compact('formationVideo'));
    }

    public function store1( $formationVideo)
    {
        /* verification des donnees */

        /* recuperation du mot de passe entrer par l'utilisateur */
        $data = request()->validate([
            'PasswordVideo' => ['required','string'],
        ]);

        $video = DB::table('videos')->latest('id')->first();

        /* comparaisaon des deux mot de passe */
        if ($video->PasswordVideo == $data['PasswordVideo']) {
 
            $req = DB::table('formation_videos')
                            ->join('formation_video_details','formation_video_details.formation_video_id','=','formation_videos.id')
                            ->select('*')
                            ->where('formation_videos.id','=',$formationVideo)
                            ->get();
            $titre = $req[0]->titre;
           
            return view('video.video-details',compact('req','titre'));
 
        }else {
            
            return redirect('PasswordVideo')->with('video','Le mot de passe est incorrect veillez ressayer ou contacter l\'administrateur pour un nouveau mot de pase');
        }

    }

    public function store()
    { 
        /* verification des donnees */
        $data = request()->validate([
 
            'titreFormationV' => ['required','string'],
            'imageFormationV' => ['required','image'],
        ]);

        /* copie du chemin des images dans le dossier uploads */
        $imagePath = request('imageFormationV')->store('uploads','public');

        $str = new GoogleTranslate('fr');
        FormationVideo::create([

            'langue' => 'fr',
            'titre' => $str->translate($data['titreFormationV']),
            'image' => $imagePath,
        ]);
        
        $str = new GoogleTranslate('en');
        FormationVideo::create([

            'langue' => 'en',
            'titre' => $str->translate($data['titreFormationV']),
            'image' => $imagePath,
        ]);
        
        return redirect('admin');
    }

    public function delete(FormationVideo $formationVideo)
    {
        
        $formationVideo->delete();

        return redirect('admin');
    }

    

    public function modify(FormationVideo $formationVideo)
    {
        $service_update=0;
        $formation_update=0;
        $temoignage_update=0;
        $article_update=0;
        $project_update=0;
        $slide_update=0;
        $formationVideo_update=1;
        $formationVideoDetails_update=0;

        return view('modify',compact('service_update','project_update','formation_update',
        'temoignage_update','article_update','slide_update','formationVideo_update','formationVideo','formationVideoDetails_update'));
    }

    public function update(FormationVideo $formationVideo)
    {
        $data = request()->validate([
 
            'titreFormationV' => ['required','string'],
        ]);
        
        if(isset($data['imageFormationV']))
        {
            $imagePath = request('imageFormationV')->store('uploads','public');
         
            $update_FormationV = [
                
                'titre' => $data['titreFormationV'],
                'image' => $imagePath,
            ];
        
            $formationVideo->update($update_FormationV);
        }
        $update_FormationV = [
                
            'titre' => $data['titreFormationV'],
        ];
        
        $formationVideo->update($update_FormationV);

        
        return redirect()->route('welcome');
    }
    
}
