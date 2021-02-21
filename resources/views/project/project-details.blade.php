<?php $cours='project'; 
?>
@extends('layouts.app')

@section('content')
    <section class="mt-4">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <img src="{{asset('storage') . '/' . $projects->image1}}" alt="Image placeholder" class="img-fluid animated wow zoomIn">
          </div>
        </div>
        <div class="row mb-5">
        @foreach($req as $valeur)
          <div class="col-md-7 ">
            <h2 class="text-uppercase heading mb-4 line-bottom">{{ __('projetDetails.details') }}</h2>
            <p class="lead">
            {{$projects->contenu}}  
             <?php echo $code ?> 
              <!-- <ul class="list-unstyled check">
                <li><a class="lead text-black">Terrassement (Tranchées pour fouilles de fondation, réseaux, fosses septiques et puisards)</a></li>
                <li><a class="lead text-black">Béton armé (Béton armé pour semelles, poteaux, longrines, poutrelles, linteaux, chaînage)  </a></li>
                <li><a class="lead text-black">Béton et maçonnerie (dallage du sol avec treillis soudés)</a></li>
                <li><a class="lead text-black">Enduis</a></li>
                <li><a class="lead text-black">Assainissement</a></li>
                <li><a class="lead text-black">Toiture et Plafonnage</a></li>
                <li><a class="lead text-black">Menuiserie et vitrerie</a></li>
              </ul> -->
            <p class="lead">{{ __('projetDetails.text1') }} <br> {{ __('projetDetails.text2') }}.</p>
              
            </p>
          </div>
            <div class="col-md-5 ">
              <h2 class="text-uppercase heading mb-4 line-bottom">{{ __('projetDetails.description') }}</h2>
              <div class="row">
                <div class="col-lg-6 mb-3">
                  <div class="row">
                    <div class="col-lg-1">
                        <i class="fa fa-user fa-3x pr-5 text-primary pt-2" aria-hidden="true"></i>
                      </div>
                      <div class="col-lg-10">
                        <span class="lead pl-3">{{ __('projetDetails.client') }} </span> <br>
                        <span class="font-weight-bold pl-3">{{$valeur->client}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                  <div class="row">
                    <div class="col-lg-1">
                        <i class="fa fa-map-marker fa-3x pr-5 text-primary pt-2" aria-hidden="true"></i>
                      </div>
                      <div class="col-lg-10">
                        <span class="lead pl-3">{{ __('projetDetails.lieu') }} </span> <br>
                        <span class="font-weight-bold pl-3">{{$valeur->lieu}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                  <div class="row">
                    <div class="col-lg-1">
                        <i class="fa fa-map-o fa-2x pr-5 text-primary pt-2" aria-hidden="true"></i>
                      </div>
                      <div class="col-lg-10">
                        <span class="lead pl-3">{{ __('projetDetails.surface') }} </span> <br>
                        <span class="font-weight-bold pl-3">{{$valeur->surface}} m²</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                  <div class="row">
                    <div class="col-lg-1">
                        <i class="fa fa-briefcase fa-3x pr-5 text-primary pt-2" aria-hidden="true"></i>
                      </div>
                      <div class="col-lg-10">
                        <span class="lead pl-4">{{ __('projetDetails.montant') }} </span> <br>
                        <span class="font-weight-bold pl-4">{{$valeur->montant}} FCFA</span>
                    </div>
                  </div>
                </div>
              </div>
                
              </div>
            </div>
            @endforeach
        <div class="row mt-5">
          <div class="col-md-6 ">
            <img src="{{asset('storage') . '/' . $projects->image2}}" alt="Image placeholder" class="img-fluid mb-4 animated wow fadeInLeft">
        </div>
        
          <div class="col-md-6 ">
            <img src="{{asset('storage') . '/' . $projects->image3}}" alt="Image placeholder" class="img-fluid mb-4 animated wow fadeInRight">
          </div>
        </div>

      </div>
    </section>
    <!-- END section -->
    
    <section class="">
      <div class="container">
        <div class="row justify-content-center mb-4 ">
          <div class="col-md-8 text-center animated wow zoomIn mb-2">
            <h2 class="animated wow fadeInUp text-uppercase heading line-bottom text-center mb-4" data-wow-delay="1s">{{ __('temoignage.titre') }}</h2>
            <p class="mb-0 lead">{{ __('temoignage.slogan') }}</p>
          </div>
        </div>

        <div class="row">@php $i=1; @endphp
          @foreach($temoignages as $temoignage)
            <div class="col-md-6 animated wow @if($i==1) slideInLeft @else slideInRight @endif" data-wow-delay="2s">
              <div class="media d-block media-testimonial text-center">
                <img src="{{asset('storage') . '/' . $temoignage->image}}" alt="Image placeholder" width="300px" height="100px">
                <p>{{$temoignage->nom}}, <a href="#">{{$temoignage->entreprise}}.</a></p>
                <div class="media-body">
                  <blockquote>
                    <p>&ldquo;{{$temoignage->temoignage }}.&rdquo;</p>  
                  </blockquote>
                </div>
              </div>
            </div>@php $i++; @endphp
          @endforeach

        </div>
      </div>
    </section>
@endsection