<?php $cours='formation'; 
?>
@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center mb-5 " >
          <div class="col-md-8 text-center">
            <h2 class="text-uppercase font-weight-bold heading mt-5 mb-4 line-bottom text-center"> Videos sur la {{ $titre }}  </h2>
        </div>
    </div>
    <div class="row mb-2">
      @foreach ($req as $record)
        <div class="col-lg-4 ">
          <div class="card">
            <img class="card-img-top" src="{{asset('storage') . '/' . $record->image}}" alt="">
            <div class="card-body">
            <a href="{{route('SeeVideo',['formationVideoDetails'=> $record->id])}}">
              <button class="btn btn-outline-success">Voir la vidéo <i class="fa fa-play-circle fa-2x" aria-hidden="true"></i> </button>
            </a>
            </div>
          </div>
        </div>
      @endforeach
    </div> 
</div>
@endsection