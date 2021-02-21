<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articles = DB::table('articles')->orderBy('created_at','DESC')->paginate(20);
        return view('blog.blog',compact('articles'));
    }
}
