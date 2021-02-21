<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function store()
    {
        if(request('element') == 1 )
        {
            
                /* si l"élément selectionner est une vidéo */
            $data = request()->validate([
                
                'DescriptionImage' => ['required','string'],
                'ItemSlide' => ['required','mimes:mp4'],
                'element' => ['required','integer'],
            ]);
        }
        else{
                /* si l"élément selectionner est une image */
            $data = request()->validate([
                
                'DescriptionImage' => ['required','string'],
                'ItemSlide' => ['required','image'],
                'element' => ['required','integer'],
            ]);
        }
        

        $itemPath = request('ItemSlide')->store('uploads','public');


        $str = new GoogleTranslate('fr');
        Slide::create([

            'langue' => 'fr',
            'text' => $str->translate($data['DescriptionImage']),
            'element' => $itemPath,
            'video' => $data['element'],
        ]);

        $str = new GoogleTranslate('en');
        Slide::create([

            'langue' => 'en',
            'text' => $str->translate($data['DescriptionImage']),
            'element' => $itemPath,
            'video' => $data['element'],
        ]);

        return redirect('admin');
    }

    public function delete(Slide $slides)
    {
        
        $slides->delete();

        return redirect('admin');
    }

    public function modify(Slide $slides)
    {
        $service_update=0;
        $formation_update=0;
        $temoignage_update=0;
        $article_update=0;
        $project_update=0;
        $slide_update=1;
        $formationVideo_update=0;
        $formationVideoDetails_update=0;


        return view('modify',compact('slides','service_update','project_update','formation_update',
        'temoignage_update','article_update','slide_update','formationVideo_update','formationVideoDetails_update'));
        
    }

    public function update(Slide $slides)
    {
        $data = request()->validate([
 
            'DescriptionImage' => ['required','string'],
            'ImageSlide' => ['image'],

        ]);

        if(isset($data['ImageSlide']))
        {
            $imagePath = request('ImageSlide')->store('uploads','public');
         
            $update_slide = [
                
                'text' => $data['DescriptionImage'],
                'image' => $imagePath,
            ];
        
            $slides->update($update_slide);
        }

        $update_slide = [
                
            'text' => $data['DescriptionImage'],
        ];
    
        $slides->update($update_slide);

        
        
        return redirect()->route('welcome');
    }
}
