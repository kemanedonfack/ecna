<?php

namespace App\Http\Controllers;


use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\categorie_project;
use App\Project;

class CategorieProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' =>'show']);
    }
    public function store()
    {
        /* verification des donnees */
        $data = request()->validate([
 
            'categorie' => ['required','string'],
            'imageCategorie' => ['required','image'],
        ]);

            /* copie du chemin des images dans le dossier uploads */
            $imagePath = request('imageCategorie')->store('uploads','public');

        $str = new GoogleTranslate('fr');
        categorie_project::create([
             
            'langue'=> 'fr',
            'nom' => $str->translate($data['categorie']),
            'image' => $imagePath,
        ]); 
        
        $str = new GoogleTranslate('en');
        categorie_project::create([
             
            'langue'=> 'en',
            'nom' => $str->translate($data['categorie']),
            'image' => $imagePath,
        ]); 

        return redirect('admin');
    }
 
    public function show( $categories)
    {
        
        $lang = app()->getLocale();
        $req = DB::table('projects')
                            ->select('*')
                            ->where('projects.categorie_projects_id','=',$categories)
                            ->orderBy('created_at','DESC')
                            ->get();

        $titre = DB::table('categorie_projects')
                            ->select('*')
                            ->where('categorie_projects.id','=',$categories)
                            ->orderBy('created_at','DESC')
                            ->get();
                            
            return view('project.singleProject',compact('req','titre'));
    }

    public function delete(categorie_project $categories)
    {
        
        $categories->delete();

        return redirect('admin');
    }
}
