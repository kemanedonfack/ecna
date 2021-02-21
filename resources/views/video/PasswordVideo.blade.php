<?php $cours='formation'; 

?>
@extends('layouts.app')

@section('content') 
    <div class="container">
        @if(session()->has('video'))
            <div class="row justify-content-center mt-2">
                <div class="col-5 alert alert-danger" role="alert">
                    {{ session()->get('video') }}
                </div> 
            </div>
        @endif
        <div class="row justify-content-center mb-3 ">
          <div class="col-md-8 text-center">
            <h2 class="text-uppercase font-weight-bold heading mt-5 mb-4 line-bottom text-center">Entrer le mot de passe donner par l'administrateur</h2>
            <div class="card shadow">
                <form action="{{route('video.store',['formationVideo' => $formationVideo])}}" method="post">
                    @csrf
                    <div class="form-group p-5">

                        <input name="PasswordVideo" class="form-control @error('PasswordVideo') is-invalid @enderror" placeholder="Entre le mot de passe ici" type="text">
                        
                        @error('PasswordVideo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button class="btn btn-primary mt-3" type="submit">Envoyer</button>
                    </div>
                    <p align="left" class="ml-5 form-text text-muted">
                        <b>NB : </b> Les formations par video sont payantes <br>
                        <b>Contact Administrateur : </b> (+237) 696 170 825 / (+237) 696 655 682
                    </p>
                </form>
            </div>
          </div>
        </div>        
    </div>
@endsection