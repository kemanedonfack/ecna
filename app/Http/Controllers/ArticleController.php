<?php

namespace App\Http\Controllers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\ArticleAdEvent;
use Illuminate\Http\Request;
use App\Mail\NewsletterMail;
use App\Newsletter;
use App\Article; 
use App\User;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' =>'show']);
    }
    
    public function store()
    {
        /* verification des donnees */
        $data = request()->validate([
 
            'TitreArticle' => ['required','string'],
            'ImageArticle' => ['required','image'],
            'ContenuArticle' => ['required','string'],

        ]);
         
            /* copie du chemin des images dans le dossier uploads */
        $imagePath = request('ImageArticle')->store('uploads','public');
       
        $auteur = Auth::user()->name;

        
        $str = new GoogleTranslate('fr');
        
        $last = Article::create([
             
            'langue' => 'fr',
            'titre' => $str->translate($data['TitreArticle']),
            'contenu' => $str->translate($data['ContenuArticle']),
            'image' => $imagePath,
            'auteur' => $auteur,
        ]);

        $str = new GoogleTranslate('en');
        
        $last = Article::create([
             
            'langue' => 'en',
            'titre' => $str->translate($data['TitreArticle']),
            'contenu' => $str->translate($data['ContenuArticle']),
            'image' => $imagePath,
            'auteur' => $auteur,
        ]);
        
        // envoi de l'article par aux abonnez a la newsletter
        $news = Newsletter::all();
        
        foreach ($news as $key) {
            
             Mail::to($key->email)->send(new NewsletterMail($last));
 
         } 
         
        return redirect('admin')->with('article','l\' article a bien été ajouté.');
    }

    public function show(Article $articles)
    { 
        return view('blog.blog-details',compact('articles'));
    }

    public function delete(Article $articles)
    {
        
        $articles->delete();

        return redirect('admin');
    }

    public function modify(Article $articles)
    {
     

        $service_update=0;
        $formation_update=0;
        $temoignage_update=0;
        $article_update=1;
        $project_update=0;
        $slide_update=0;
        $formationVideo_update=0;
        $formationVideoDetails_update=0;

        return view('modify',compact('articles','Service','service_update','project_update','formation_update',
        'temoignage_update','article_update','slide_update','formationVideo_update','formationVideoDetails_update'));
        
    }

    public function update(Article $article)
    {
        $data = request()->validate([
 
            'TitreArticle' => ['required','string'],
            'ImageArticle' => ['image'],
            'ContenuArticle' => ['required','string'],

        ]);
        $auteur = Auth::user()->name;

            if(isset($data['ImageArticle']))
            {
                /* copie du chemin des images dans le dossier uploads */
             $imagePath = request('ImageArticle')->store('uploads','public');
             
                $update_article = [
                
                    'titre' => $data['TitreArticle'],
                    'contenu' => $data['ContenuArticle'],
                    'image' => $imagePath,
                    'auteur' => $auteur,
                ];

                $article->update($update_article);

             return redirect('admin');
            }
         
        
        $update_article = [
            
            'titre' => $data['TitreArticle'],
            'contenu' => $data['ContenuArticle'],
            'auteur' => $auteur,
        ];
        
        $article->update($update_article);
        
        return redirect()->route('welcome');
    }

}
