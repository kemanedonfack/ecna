<?php $cours='login'; 
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <h3 class="text-primary">{{__('login.titre')}}</h3>
            <p class="font-weight-bold">{{__('login.explication')}}</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                <input id="email" type="email" placeholder="{{__('login.PlaceholderEmail')}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                <input id="password" type="password" placeholder="{{__('login.PlaceholderPass')}}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <button type="submit" class="col-12 btn btn-primary btn-lg">
                    {{ __('login.button') }}
                    </button>
                </div>
                <div align="center">
                    <a href="{{route('register')}}"><span class="pr-3 border-right border-dark">{{__('login.lienCompte')}}</span></a>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('login.PassOublie') }}
                        </a>
                    @endif
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{__('login.souvenir')}}</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="offset-lg-2 col-lg-4 col-md-6 col-sm-12 mt-5 pt-3">
            <h3 align="center" class="text-primary font-weight-bold pb-2">
            {{__('login.suivre')}}
            </h3>
            <p align="center">
                <a href="https://m.facebook.com/pages/category/Business-Service/ECNA-cameroun-101786388026829/">
                    <i class="fab fa-facebook fa-4x text-primary mr-4"></i>
                </a>
                <a href="https://twitter.com/EcnaCameroun?s=09"><i class="fab fa-twitter fa-4x text-primary mr-4"></i></a>
                <a href="https://www.youtube.com/channel/UCBv3ppcXWmy2CNyjIO9dang" target="_blank" ><i class="fab fa-youtube fa-4x text-danger mr-4"></i></a>
                <a href="https://wa.me237691525086" target="_blank" > <i class="fa fa-whatsapp fa-4x text-success" aria-hidden="true"></i> </a>
            </p>
        </div>
    </div>
</div>
@endsection
