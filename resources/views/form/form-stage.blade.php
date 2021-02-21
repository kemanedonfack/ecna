<?php $cours='formation'; 
?>
@extends('layouts.app')

@section('content')
<section class="home-slider  inner-page owl-carousel">
        <div class="slider-item" style="background-image: url({{asset('image/banniere2.jpg')}});">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center text-center">
                    <div class="col-md-7 col-sm-12 ">
                        <h1 class="animated wow rubberBand">{{ __('Stage.titre') }}</h1>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="section p-5">
    <div class="row justify-content-center content-form">
        <div class="col-lg-6 card p-5 shadow form-responsive">
            <h4 class="mb-3 font-weight-bold line-bottom">{{ __('Stage.TitreForm') }}</h4>

            <form action="{{route('demandeStage')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="{{ __('Stage.PlaceholderNom') }}">
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg @error('prenom') is-invalid @enderror" name="prenom" id="prenom" placeholder="{{ __('Stage.PlaceholderPrenom') }}">
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="email" placeholder="{{ __('Stage.PlaceholderEmail') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg @error('adresse') is-invalid @enderror" name="adresse" id="adresse" placeholder="{{ __('Stage.PlaceholderAdresse') }}">
                    @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg @error('numero') is-invalid @enderror" name="numero" id="numero" placeholder="{{ __('Stage.PlaceholderTel') }}">
                    @error('numero')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <select name="formation" id="formation" class="form-control form-control-lg mb-2">
                        @foreach($formations as $formation)
                            <option value="{{$formation->titre}}">{{$formation->titre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="demande" class="custom-file-input @error('demande') is-invalid @enderror" id="validatedCustomFile" >
                        <label class="custom-file-label" for="validatedCustomFile">{{ __('Stage.PlaceholderFile') }} </label>
                        @error('demande')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="{{ __('Stage.button') }}" class="btn btn-primary">
                </div> 
            </form>  
        </div>
    </div>
</section>
@endsection