<?php $cours='formation'; 
?>
@extends('layouts.app')

@section('content')
    <section class="home-slider  inner-page owl-carousel">
        <div class="slider-item" style="background-image: url({{asset('image/banniere/formation.jpg')}});">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center text-center">
                    <div class="col-md-7 col-sm-12 ">
                        <h1 class="animated wow rubberBand">{{ __('formation.titre') }}</h1>
                        <p>{{ __('formation.h2') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="">
    <div class="container">
        <div class="row justify-content-center mb-5 ">
          <div class="col-md-8 text-center">
            <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">{{ __('formation.titre') }}</h2>
            <p class="mb-3 lead">{{ __('formation.h2') }}.</p>
          </div>
        </div>

        <div class="row mb-5 ">
          
          @foreach($formations as $formation)
            <div class="col-lg-4 col-md-6 col-12 mb-3 ">
              <div class="media d-block media-feature text-center">
                <span class="flaticon-engineer icon"></span>
                <div class="media-body">
                  <h3 class="mt-0 text-black">{{$formation->titre}}</h3>
                    @php  $conten = $formation->description  @endphp

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
                  <p><a href="{{route('formation.show',['formations' => $formation->id])}}" class="btn btn-outline-primary btn-sm">{{ __('formation.button') }}</a></p>
                </div>
              </div>
            </div>
          @endforeach
          
        </div>
        
        <div class="col-md-12 mb-2">
          <a href="{{route('form-formation')}}" class="mb-2 btn btn-primary mr-4">{{ __('formation.SuivreFormation') }}</a>
          <a href="{{route('form-stage')}}" class="mb-2 btn btn-primary">{{ __('formation.stage') }}</a>
        </div>
        <!-- <div class="row justify-content-center mb-5 ">
          <div class="col-md-8 text-center">
            <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">Suivre Nos Formations en video</h2>
            <p class="mb-3 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
          </div> 
        </div>
        <div class="row mb-5">
            @foreach($formationVideos as $formationVideo)
              <div class="col-lg-4 ">
                <a href="{{route('PasswordVideo',['formationVideo' => $formationVideo->id])}}" class="link-thumbnail">
                  <h3>{{$formationVideo->titre}}</h3>
                  <span class="ion-plus icon"></span>
                  <img src="{{asset('storage') . '/' . $formationVideo->image}}" alt="Image placeholder" class="img-fluid" >
                </a>
              </div>
            @endforeach
        </div> -->
      </div>
    </div>
  </section>
@endsection



