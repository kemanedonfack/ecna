<?php $cours='formation'; 
?>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-2 mb-2">
        <div class="col-lg-10">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{$formationVideoDetails->lien}}" allowfullscreen></iframe>
        </div>
        </div>
    </div>
</div>

@endsection