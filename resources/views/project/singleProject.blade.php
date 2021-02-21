<?php $cours='project'; 
?>
@extends('layouts.app')

@section('content')
<section class="home-slider  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url({{asset('image/banniere/projet2.jpg')}});">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-7 col-sm-12">
              <h1 class="animated wow rubberBand">{{ __('projet.titre') }}</h1>
              <p>{{ __('projet.h2') }}</p>
            </div>
          </div>
        </div>

      </div>
      
</section>

<section class="mt-5 border-t">
    <div class="container">
        <div class="row justify-content-center mb-5 ">
            <div class="col-md-8 text-center">
            @foreach($titre as $ti)
            <h2 class="text-uppercase heading mb-4 line-bottom text-center ">{{ __('projet.h4') }} {{ $ti->nom }} </h2>
            @endforeach
              <!-- <p class="mb-3 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p> -->
            </div>
        </div>

        <div class="row">
            <div class="row no-gutters justify-content-center ">
                @foreach($req as $record)
                    <div class="col-md-4 mb-2 animated wow fadeInUp">
                      <a href="{{route('project.show',['projects' => $record->id])}}" class="link-thumbnail">
                        <h3>{{$record->titre}}</h3>
                        <span class="ion-plus icon"></span>
                        <img src="{{asset('storage') . '/' . $record->image1}}" alt="Image placeholder" class="img-fluid">
                      </a>
                    </div>
                @endforeach
            </div> 
        </div>
         
    </div>
</section>
@endsection