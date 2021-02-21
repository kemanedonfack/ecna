<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormationVideoDetails;
use App\FormationVideo;

class FormationVideoDetailsController extends Controller
{
    public function store()
    {
        /* verification des donnees */
        $data = request()->validate([
 
            'formationVideo' => ['required','integer'],
            'lienVideo' => ['required','string'],
            'imageVideo' => ['required','image'],
        ]);

            /* copie du chemin des images dans le dossier uploads */
            $imagePath = request('imageVideo')->store('uploads','public');

        FormationVideoDetails::create([
             
            'lien' => $data['lienVideo'],
            'formation_video_id' =>$data['formationVideo'],
            'image' => $imagePath,
        ]);

        return redirect('admin');
    }

    public function delete(FormationVideoDetails $formationVideoDetails)
    {
        $formationVideoDetails->delete();

        return redirect('admin');
    }

    public function modify(FormationVideoDetails $formationVideoDetails)
    {
        $formationVideos = FormationVideo::all();
        $service_update=0;
        $formation_update=0;
        $temoignage_update=0;
        $article_update=0;
        $project_update=0;
        $slide_update=0;
        $formationVideo_update=0;
        $formationVideoDetails_update=1;

        return view('modify',compact('service_update','project_update','formation_update','temoignage_update','article_update',
        'slide_update','formationVideo_update','formationVideoDetails_update','formationVideoDetails','formationVideos'));
    }

    public function update(FormationVideoDetails $formationVideoDetails)
    {
        $data = request()->validate([
 
            'formationVideo' => ['required','integer'],
            'lienVideo' => ['required','string'],
        ]);
        
        $update_FormationVD = [

            'formation_video_id' => $data['formationVideo'],   
            'lien' => $data['lienVideo'],
        ];
        
        $formationVideoDetails->update($update_FormationVD);

        
        return redirect()->route('welcome');
    }
    public function SeeVideo(FormationVideoDetails $formationVideoDetails)
    {
        return view('video.SingleVideo',compact('formationVideoDetails'));
    }
}
