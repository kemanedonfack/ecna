<?php $cours='contact'; 
?>
@extends('layouts.app')

@section('content')
<section class="home-slider  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url({{asset('image/banniere2.jpg')}});">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center text-center">
            <div class="col-md-7 col-sm-12">
              <h1 class="animated wow rubberBand">{{ __('contact.titre') }}</h1>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p> -->
            </div>
          </div>
        </div>

      </div>
      
    </section>
    <!-- END slider -->
    
    <section class="section">
      <div class="container">
      <div class="row">
        <div class="col-12">
          @if(session()->has('contacter'))
            <div class="col-5 alert alert-success" role="alert">
              {{ session()->get('contacter') }}
            </div>
          @endif
        </div>
      </div>
        <div class="row">
          <div class="col-md-7">
            <form action="{{route('contact.store')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="prenom">{{ __('contact.prenom') }}</label>
                  <input type="text" name="prenom" id="prenom" class="form-control form-control-lg @error('prenom') is-invalid @enderror">
                  @error('prenom')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                   </span>
                  @enderror
                </div>

                <div class="col-md-6 form-group">
                  <label for="nom">{{ __('contact.nom') }}</label>
                  <input type="text" name="nom" class="form-control form-control-lg @error('nom') is-invalid @enderror" id="nom">
                    @error('nom')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">{{ __('contact.email') }}</label>
                  <input type="text" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">{{ __('contact.message') }}</label>
                  <textarea name="message" id="message" class="form-control form-control-lg @error('message') is-invalid @enderror" cols="30" rows="8"></textarea>
                    @error('message')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="{{ __('contact.button') }}" class="btn btn-primary btn-lg btn-block">
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-4">
            <h5 class="text-uppercase mb-3">{{ __('contact.adresse') }}</h5>
            <p class="mb-5">Tradex PK10 ,  <br> Douala Dla </p>
            
            <h5 class="text-uppercase mb-3">{{ __('contact.emailTo') }}</h5>
            <p class="mb-5"><a href="">direction@ecnacameroun.com</a></p>
            
            <h5 class="text-uppercase mb-3">{{ __('contact.NosContact') }}</h5>
            <p class="mb-5">Phone: (+237) 696 655 682 <br> Mobile: (+237) 696 170 825 <br> </p>
          </div>
        </div>
      </div>
    </section>
    <section>
    
    </section>
    

@endsection