<?php $textTemoignage="Votre satisfaction notre motivation"; ?>
        
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('image/icone.ico')}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Engineering construction</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}" ></script>
    <script src="{{ asset('js/jquery.flexslider-min.js') }}" ></script>
    <script src="{{ asset('js/jquery.countTo.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap3.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/styl2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- icone -->
    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts2/flaticon/font/flaticon.css') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark none">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="" class="animated wow fadeInLeft nav-link text-light font-weight-bold">
                            <i class="fas fa-phone-alt fa-1x mr-4"></i>
                                +237 243 094 204 / +237 657 858 762
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.google.com/maps/d/drive?state=%7B%22ids%22%3A%5B%221Gm_i6IZoq6tpptwFgNE3xGGL3Laow_2V%22%5D%2C%22action%22%3A%22open%22%2C%22userId%22%3A%22108833547330555276316%22%7D&usp=sharing" 
                            target="_blank" class="nav-link animated wow fadeInLeft text-light font-weight-bold">
                                <i class="fa fa-map-marker"></i>
                                7432 Tradex PK10 , Douala
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link animated wow fadeInRight text-light font-weight-bold">
                            <i class="fas fa-clock fa-1x mr-4"></i>
                                {{ __('messages.navbar.heure') }}
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item animated wow fadeInRight">
                            <a href="https://m.facebook.com/pages/category/Business-Service/ECNA-cameroun-101786388026829/"  target="_blank"><i class="fab fa-facebook fa-1x text-light mr-4"></i></a>
                        </li>
                        <li class="nav-item animated wow fadeInRight">
                            <a href="https://twitter.com/EcnaCameroun?s=09"  target="_blank"><i class="fab fa-twitter fa-1x text-light mr-4"></i></a>
                        </li>
                        <li class="nav-item animated wow fadeInRight">
                            <a href="https://www.youtube.com/channel/UCBv3ppcXWmy2CNyjIO9dang" target="_blank" ><i class="fab fa-youtube fa-1x text-light mr-4"></i></a>
                        </li>
                        <li class="nav-item animated wow fadeInRight">
                            <a href="https://wa.me237697683517" target="_blank" > <i class="fa fa-whatsapp fa-1x text-light" aria-hidden="true"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="{{asset('image/3.png')}}" class="img-fluid" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav size ml-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class=" nav-link text-dark font-weight-bold @if($cours=='home'){ actif }@endif"> {{ __('messages.navbar.home') }} </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('project') }}" class="nav-link text-dark font-weight-bold @if($cours=='project'){ actif }@endif">{{ __('messages.navbar.project') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('formation.index') }}" class="nav-link text-dark font-weight-bold @if($cours=='formation'){ actif }@endif">{{ __('messages.navbar.formation') }}</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{ route('blog.index') }}" class="nav-link text-dark font-weight-bold @if($cours=='blog'){ actif }@endif">{{ __('messages.navbar.blog') }}</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link text-dark font-weight-bold @if($cours=='contact'){ actif }@endif">{{ __('messages.navbar.contact') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        
                         @guest
                            <li class="nav-item">
                                <a class="nav-link" class="nav-link text-dark font-weight-bold @if($cours=='login'){ actif }@endif" href="{{ route('login') }}">{{ __('messages.navbar.connexion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" class="nav-link text-dark font-weight-bold @if($cours=='register'){ actif }@endif" href="{{ route('register') }}">{{ __('messages.navbar.inscription') }}</a>
                                </li>
                            @endif
                        @else
                            @if(Auth::user()->status == 1)
                            <li class="nav-item">
                                <a href="{{ route('admin') }}" class="nav-link text-dark font-weight-bold @if($cours=='admin'){ actif }@endif">Admin</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest 
                        <li class="nav-item dropdown d-md-down-none">
                            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ strtoupper(app()->getLocale()) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="">
            @yield('content')
            
        </main>
        <section class="animated wow rubberBand">
            <div id="colorlib-subscribe">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                    <div class="col-md-12 col-md-offset-0 colorlib-heading ">
                        <h2>{{ __('newsletter.titre') }}</h2>
                        <div class="row">
                        <div class="col-md-6">
                            <p>{{ __('newsletter.description') }}</p>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('newsletter')}}" method="post" class="form-inline qbstp-header-subscribe">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-0">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control h-100" id="mail" required placeholder="{{ __('newsletter.placeholder') }}">
                                        <button type="submit" class="btn btn-primary h-100">{{ __('newsletter.button') }}</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="site-footer " style="background-color:black;color:white;">
            <div class="container">
                <div class="row">
                <div class="col-lg-4">
                    <h4 class="footer-heading mb-4">{{ __('footer.apropos') }}</h4>
                        <p>
                            {{ __('footer.aproposdes') }}
                        </p>
                </div>
                <div class="col-lg-8 ml-auto">
                    <div class="row">
                    <div class="col-lg-4">
                        <h4 class="footer-heading mb-4"> {{ __('footer.champ') }}</h4>
                        <ul class="list-unstyled check">
                            <li><a href="#">{{ __('footer.champs.btp') }}</a></li>
                            <li><a href="#">{{ __('footer.champs.construcmeta') }}</a></li>
                            <li><a href="#">{{ __('footer.champs.construcmeca') }}</a></li>
                            <li><a href="#">{{ __('footer.champs.repara') }}</a></li>
                            <li><a href="#">{{ __('footer.champs.formation') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="footer-heading mb-4">{{ __('footer.contact') }}</h4>
                        <ul class="list-unstyled">
                        <li><i class="fas fa-phone-alt fa-1x text-primary mr-2 mb-2"></i>(+237) 243 094 204</li>
                        <li><i class="fas fa-phone-alt fa-1x text-primary mr-2 mb-2"></i>(+237) 657 858 762</li>
                        <li><i class="fas fa-phone-alt fa-1x text-primary mr-2 mb-2"></i>(+237) 681 871 757</li>
                        <li><i class="fas fa-envelope fa-1x text-primary mr-2 mb-2"></i>direction@ecnacameroun.com</li>
                       </ul>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="footer-heading mb-4">{{ __('footer.suivre') }}</h4>
                        <ul class="list-unstyled">
                            <a href="https://m.facebook.com/pages/category/Business-Service/ECNA-cameroun-101786388026829/" target="_blank">
                                <i class="fab fa-facebook fa-2x text-light mr-4"></i>
                            </a>
                            <a href="https://twitter.com/EcnaCameroun?s=09"><i class="fab fa-twitter fa-2x text-light mr-4" target="_blank"></i></a>
                            <a href="https://www.youtube.com/channel/UCBv3ppcXWmy2CNyjIO9dang" target="_blank" ><i class="fab fa-youtube fa-2x text-light mr-4"></i></a> 
                            <a href="https://wa.me237697683517" target="_blank" > <i class="fa fa-whatsapp fa-2x text-light" aria-hidden="true"></i> </a>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="border-top pt-5">
                    <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> ecnacameroun. All rights reserved 
                    </p>
                    </div>
                </div>

                </div>
            </div>
    </footer>
    </div>
    <div class="modal fade" id="ModalTemoignages" tabindex="-1" role="dialog" aria-labelledby="ModalTemoignagesTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <form action="{{route('temoignage.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="ModalTemoignagesTitle">Ajouter un témoignage</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label class="font-weight-bold">NB les champs avec <span class="font-weight-bold text-primary">*</span> sont obligatoires</label>
            <input type="text" name="nom" id="nom" class="form-control mb-2" placeholder="* Nom du client....">
            <input type="text" name="entreprise" id="entreprise" class="form-control mb-2" placeholder="* Nom de l'entreprise....">
            <textarea name="temoignage" id="temoignage" cols="30" rows="10" placeholder="* temoignage...." class="form-control form-control-md mb-2"></textarea>
            <div class="custom-file mb-2">
                <input type="file" name="PhotoClient" class="custom-file-input" id="validatedCustomFile" >
                <label class="custom-file-label" for="validatedCustomFile">Choisir une photo...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
        </div>
        <div class="modal-footer">
            
            <input type="submit" class="btn btn-primary" value="Ajouter">
        </div>
      </form>
    </div>
  </div>
</div>
</body> 

<script src="{{ asset('js/wow.min.js') }}" ></script>
<script>
    new WOW().init();
</script>
</html>
