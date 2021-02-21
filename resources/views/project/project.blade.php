<?php $cours='project'; 
?>
@extends('layouts.app')

@section('content')
    <section class="home-slider  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url({{asset('image/banniere/projet1.jpg')}});">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-7 col-sm-12">
              <h1 class="animated wow rubberBand">{{ __('projet.h1') }} </h1>
              <p> {{ __('projet.h2') }} </p>
            </div>
          </div>
        </div>

      </div>
      
    </section>
    <!-- END slider -->
    
    <section class="mt-5 border-t">
        <div class="container">
          <div class="row justify-content-center mb-5 ">
            <div class="col-md-8 text-center">
              <h2 class="text-uppercase heading mb-4 line-bottom text-center ">{{ __('projet.titre') }}  </h2>
              <p class="mb-3 lead">{{ __('projet.h2') }} </p>
            </div>
          </div>
          <div class="row">
              @foreach($categories as $categorie )
            <div class="col-lg-4 mb-5">
                <div class="row justify-content-center ">
                  <div class="col-md-8 text-center">
                    <h4 class="text-uppercase heading mb-4 line-bottom text-center ">{{ __('projet.h4') }}  {{$categorie->nom}} </h4>
                  </div>
                </div>
                <div class="row no-gutters justify-content-center ">
                    <div class="col-md-12 mb-2 animated wow fadeInUp">
                      <a href="{{route('categorie.show',['categories' => $categorie->id])}}" class="link-thumbnail">
                        <h3>{{$categorie->titre}}</h3>
                        <span class="ion-plus icon"></span>
                        <img src="{{asset('storage') . '/' . $categorie->image}}" alt="Image placeholder" class="img-fluid">
                      </a>
                    </div>
                </div>      
            </div>    
            @endforeach
          </div>
         
        </div>
      </section>
    
    <section>
      <div class="container">
      <div class="row justify-content-center mb-4 ">
          <div class="col-md-8 text-center animated wow zoomIn mb-2">
            <h2 class="animated wow fadeInUp text-uppercase heading line-bottom text-center mb-4" data-wow-delay="1s">{{ __('temoignage.titre') }}</h2>
            <p class="mb-0 lead">{{ __('temoignage.slogan') }}</p>
          </div>
        </div>

        <div class="row">@php $i=1; @endphp
          @foreach($temoignages as $temoignage)
            <div class="col-md-6 animated wow @if($i==1) slideInLeft @else slideInRight @endif" data-wow-delay="2s">
              <div class="media d-block media-testimonial text-center">
                <img src="{{asset('storage') . '/' . $temoignage->image}}" alt="Image placeholder" width="300px" height="100px">
                <p>{{$temoignage->nom}}, <a href="#">{{$temoignage->entreprise}}.</a></p>
                <div class="media-body">
                  <blockquote>
                    <p>&ldquo;{{$temoignage->temoignage }}.&rdquo;</p>  
                  </blockquote>
                </div>
              </div>
            </div>@php $i++; @endphp
          @endforeach

        </div>
      </div>
      </div>
    </section>
@endsection