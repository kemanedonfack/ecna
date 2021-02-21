<?php

namespace App\Http\Controllers;


use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Project;
use App\Temoignage;
use App\categorie_project;
use App\DescriptionProject;

class ProjectController extends Controller
{
    public function index()
    {
        
        $lang = app()->getLocale();
        $temoignages = DB::table('temoignages')->where('langue','=',$lang)->paginate(2);
        $categories = categorie_project::all()->where('langue','=',$lang);
        $projects = Project::all();
       

        return view('project.project',compact('temoignages','projects','categories'));
    }
    public function store()
    {
        
        /* verification des donnees */
        $data = request()->validate([
 
            'TitreProject' => ['required','string'],
            'ClientProject' => ['required','string'],
            'MontantProject' => ['required','string'],
            'LieuProject' => ['required','string'],
            'SurfaceProject' => ['string'],
            'image1' => ['required','image'],
            'image2' => ['required','image'],
            'image3' => ['required','image'],
            'DescriptionProject' => ['required','string'],
            'categorie' => ['required','integer'],
            
        ]);
        
            /* copie du chemin des images dans le dossier uploads */
        $imagePath1 = request('image1')->store('uploads','public');
        $imagePath2 = request('image2')->store('uploads','public');
        $imagePath3 = request('image3')->store('uploads','public');
        
        
        $str = new GoogleTranslate('fr');
        DescriptionProject::create([

            'langue' => 'fr',
            'lieu' => $str->translate($data['LieuProject']),
            'client' => $str->translate($data['ClientProject']),
            'surface' => $str->translate($data['SurfaceProject']),
            'montant' => $str->translate($data['MontantProject']),
        ]);
        
        $id=0;
        $idDescription = DescriptionProject::orderBy('id','DESC')->first();
        if($idDescription == null)
        {
            $id=1;
        }
        else{
            
        $last = DescriptionProject::orderBy('id','DESC')->first();
            $id = $last->id;
        }


        $str = new GoogleTranslate('en');
        DescriptionProject::create([

            'langue' => 'en',
            'lieu' => $str->translate($data['LieuProject']),
            'client' => $str->translate($data['ClientProject']),
            'surface' => $str->translate($data['SurfaceProject']),
            'montant' => $str->translate($data['MontantProject']),
        ]);
            
        
        // dd($idDescription->id);
        

        // dd($last);

        $str = new GoogleTranslate('fr');
        Project::create([
            
            'langue' => 'fr',
            'titre' => $str->translate($data['TitreProject']),
            'contenu' => $str->translate($data['DescriptionProject']),
            'image1' => $imagePath1,
            'image2' => $imagePath2,
            'image3' => $imagePath3,
            'categorie_projects_id' => $data['categorie'],
            'description_projects_id' => $id ,

        ]);

        
        $str = new GoogleTranslate('en');
        Project::create([

            'langue' => 'en',
            'titre' => $str->translate($data['TitreProject']),
            'contenu' => $str->translate($data['DescriptionProject']),
            'image1' => $imagePath1,
            'image2' => $imagePath2,
            'image3' => $imagePath3,
            'categorie_projects_id' => $data['categorie'] +1,
            'description_projects_id' => $id +1,

        ]);

        return redirect('admin')->with('project','le project a bien été ajouté.');;
    }

    public function show(Project $projects)
    {
        $lang = app()->getLocale();
        
        $temoignages = DB::table('temoignages')->where('langue',$lang)->paginate(2);
        

        $req = DB::table('description_projects')
        ->select('*')
        ->where('description_projects.id','=',$projects->description_projects_id)
        ->get();

        $req2 = DB::table('categorie_projects')
        ->select('*')
        ->where('categorie_projects.id','=',$projects->categorie_projects_id)
        ->get();

        $code = $req2[0]->code;

        return view('project.project-details',compact('projects','temoignages','req','code'));
    }

    public function delete(Project $projects)
    {
        // dd($projects);
        $projects->delete();
        DB::table('description_projects')->where('id',$projects->description_projects_id)->delete();

        return redirect('admin');
    }

    public function modify(Project $projects)
    {
        

        $service_update=0;
        $formation_update=0;
        $temoignage_update=0;
        $article_update=0;
        $project_update=1;
        $slide_update=0;
        $formationVideo_update=0;
        $formationVideoDetails_update=0;
        $categories = categorie_project::all();
        
        $req = DB::table('description_projects')
        ->select('*')
        ->where('description_projects.id','=',$projects->description_projects_id)
        ->get();

        return view('modify',compact('projects','service_update','project_update','formation_update','categories','req',
        'temoignage_update','article_update','slide_update','formationVideo_update','formationVideoDetails_update'));
        
    }

    public function update(Project $project)
    {
        
        $data = request()->validate([
 
            'TitreProject' => ['required','string'],
            'ClientProject' => ['required','string'],
            'MontantProject' => ['required','string'],
            'LieuProject' => ['required','string'],
            'SurfaceProject' => ['required','string'],
            'image1' => ['image'],
            'image2' => ['image'],
            'image3' => ['image'],
            'DescriptionProject' => ['required','string'],
            'categorie' => ['required','integer'],
            
        ]);


        if(isset($data['image1']) && isset($data['image2']) && isset($data['image3']) ){
            
            // si les images on été modifie on execute ce blog

            /* copie du chemin des images dans le dossier uploads */
            $imagePath1 = request('image1')->store('uploads','public');
            $imagePath2 = request('image2')->store('uploads','public');
            $imagePath3 = request('image3')->store('uploads','public');

            $update_project = [
            
                'titre' => $data['TitreProject'],
                'contenu' => $data['DescriptionProject'],
                'image1' => $imagePath1,
                'image2' => $imagePath2,
                'image3' => $imagePath3,
                'categorie_projects_id' => $data['categorie'],
            ];
            
            DB::table('description_projects')->where('id',$project->description_projects_id)
                                        ->update([
                                            'lieu' => $data['LieuProject'],
                                            'client' => $data['ClientProject'],
                                            'surface' => $data['SurfaceProject'],
                                            'montant' => $data['MontantProject'],
                                        ]);
                                        
            $project->update($update_project);
            
            return redirect()->route('welcome');
        }
        
        $update_project = [
            
            'titre' => $data['TitreProject'],
            'contenu' => $data['DescriptionProject'],
            'categorie_projects_id' => $data['categorie'],
        ];
        

        // dd($description);

        $project->update($update_project);

        DB::table('description_projects')->where('id',$project->description_projects_id)
                                        ->update([
                                            'lieu' => $data['LieuProject'],
                                            'client' => $data['ClientProject'],
                                            'surface' => $data['SurfaceProject'],
                                            'montant' => $data['MontantProject'],
                                        ]);
        // $description->update($update_description);
        
        return redirect()->route('welcome');
    }
}
