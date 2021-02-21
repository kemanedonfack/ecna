<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Temoignage;
use App\Services;
use App\Project;
use App\Article;
use App\Slide;

class WelcomeController extends Controller 
{
    public function index()
    {
        $var = new Controller();
        $email = $var->email;
        $lang = app()->getLocale();
        // dd($lang);
        $projects = DB::table('projects')->where('langue','=',$lang)->orderBy('created_at','DESC')->paginate(3);
        $articles = DB::table('articles')->where('langue','=',$lang)->orderBy('created_at','DESC')->paginate(3);
        $temoignages = DB::table('temoignages')->where('langue','=',$lang)->orderBy('created_at','DESC')->paginate(2);
        $services = Services::with('icone')->where('langue','=',$lang)->orderBy('created_at','DESC')->paginate(3);
        $slides = DB::table('slides')->where('langue','=',$lang)->orderBy('created_at','DESC')->paginate(3);
        return view('welcome',compact('projects','articles','temoignages','services','slides','email'));
    }
}
