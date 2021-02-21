<?php $cours='register'; 
?>
@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-lg-6">
            <h4 class="text-primary font-weight-bold">{{__('register.titre')}}</h4>
            <p class="font-weight-bold">{{__('register.description')}}</p>
            <p class="font-weight-bold">{{__('register.infos')}}</p>
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nom">{{__('register.nom')}} *</label>
                    <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="{{__('register.PlacehoderNom')}}">
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{__('register.email')}} *</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('register.PlaceholderEmail')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group"> 
                    <label for="avatar">{{__('register.avatar')}}</label>
                    <div class="custom-file mb-2">
                        <input type="file" name="avatar" class="custom-file-input @error('avatar') is-invalid @enderror" id="validatedCustomFile" >
                        <label class="custom-file-label" for="validatedCustomFile">{{__('register.PlaceholderAvatar')}}</label>
                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                <div class="form-group">
                    <label for="password">{{__('register.pass')}} *</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('register.PlaceholderPass')}}" name="password" autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{__('register.PassC')}}  *</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="{{__('register.PlaceholderPassC')}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-12" value="{{__('register.button')}}">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
