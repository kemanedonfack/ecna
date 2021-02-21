<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\FormationVideoDetails;
use App\FormationVideo;
use App\Article;
use App\Project;
use App\Formation;
use App\Temoignage;
use App\Services;
use App\Icone;
use App\Slide;
use App\Video;
use App\categorie_project;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        if(auth()->user()->status == 1)
        {
            $articles =  Article::all();
            $projects = Project::all();
            $formations = Formation::all();
            $temoignages = Temoignage::all();
            $services = Services::all();
            $icones = Icone::all();
            $slides = Slide::all();
            $video = DB::table('videos')->latest('id')->first();
            $formationVideos = FormationVideo::all();
            $formationVideoDetails = FormationVideoDetails::all();
            $categories = categorie_project::all();
            
            return view('admin',compact('categories','articles','projects','formations','temoignages','services','icones','slides',
                                        'video','formationVideos','formationVideoDetails'));
        }
        else{
            return redirect('home');
        }
    }
}
