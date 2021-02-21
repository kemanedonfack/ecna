<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Project;
use App\Article;
use App\Temoignage;
use App\Services;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lang = app()->getLocale();

        $projects = DB::table('projects')->where('langue','=',$lang)->paginate(3);
        $articles = DB::table('articles')->where('langue','=',$lang)->paginate(3);
        $temoignages = DB::table('temoignages')->where('langue','=',$lang)->paginate(2);
        $services = Services::with('icone')->orderBy('created_at','DESC')->paginate(3);
        $slides = DB::table('slides')->where('langue','=',$lang)->paginate(3);
        return view('home',compact('projects','articles','temoignages','services','slides'));
    }
}
 