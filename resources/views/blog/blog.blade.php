<?php $cours='blog'; 
?>
@extends('layouts.app')

@section('content')
    <section class="home-slider  inner-page owl-carousel">
        <div class="slider-item" style="background-image: url({{asset('image/banniere2.jpg')}});">
            
            <div class="container">
            <div class="row slider-text align-items-center justify-content-center text-center">
                <div class="col-md-7 col-sm-12 ">
                <h1 class="animated wow rubberBand">Notre Blog</h1>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p> -->
                </div>
            </div>
            </div>

        </div>
        
    </section>
    
    <section class="section">
      <div class="">
        <div class="container">
          <div class="row">
          @foreach($articles as $article)
              <div class="col-lg-4 col-md-6 mb-4 animated wow fadeInUp" data-wow-delay="0.5s">
                <div class="post-entry-1 h-100 ">
                  <a href="{{route('article.show',['articles' => $article->id])}}">
                    <img src="{{asset('storage') . '/' . $article->image}}" alt="Image" class="img-fluid">
                  </a>
                  <div class="post-entry-1-contents">
                    
                    <h2><a href="{{route('article.show',['article' => $article->id])}}">{{$article->titre}}</a></h2>
                    <span class="meta d-inline-block mb-3">{{Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}<span class="mx-2">Par</span> 
                    <span class="text-primary">{{$article->auteur}}</span></span>
                    @php  $conten = $article->contenu  @endphp

                      <!--SI la variable contenant le texte long dépasse 20 caractères-->
                      @if ( strlen($conten) >= 120)
                      <!--On l'affiche avec un bouton "Voir +" et le contenu entier en hover (title)-->
                      <p title="{{$conten }}">
                            {{ substr($conten, 0, 120)."......." }} <!--On le découpe au 20ème caractères, et on écrit "..."-->
                        </p>
                      <!--Sinon, on l'affiche en entier-->
                      @else
                      
                              {{ $conten  }}
                        
                      @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

@endsection