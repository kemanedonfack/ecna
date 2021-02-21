<?php $cours='service'; 
?>
@extends('layouts.app')

@section('content')
    <section class="home-slider  inner-page owl-carousel">
        <div class="slider-item" style="background-image: url({{asset('image/banniere/service.jpg')}});">
            
            <div class="container">
            <div class="row slider-text align-items-center justify-content-center text-center">
                <div class="col-md-7 col-sm-12 ">
                <h1 class="animated wow rubberBand">{{ __('service.titre') }}</h1>
                <p>{{ __('service.description') }}.</p>
                </div>
            </div>
            </div> 

        </div>
        
    </section>

    <section class="section">
      <div class="container">
      <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">{{ __('service.titre') }}</h2>
        <div class="row">
        @foreach($services as $service)
            <div class="col-lg-4 col-md-6 col-12 mb-3 animated wow fadeInLeft" data-wow-delay="1s">
              <div class="media d-block media-feature text-center">
                <span class="{{$service->icone->valeur}} icon"></span>
                <div class="media-body">
                  <h3 class="mt-0 text-black">{{$service->nom}}</h3>
                  <p>{{$service->description}}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
@endsection