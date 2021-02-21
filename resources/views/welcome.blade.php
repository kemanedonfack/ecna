<?php $cours='home'; 
?>
@extends('layouts.app')

@section('content')
<div class="bg-white">
      <!-- debut du slide -->
    <div class="card w-100 ">
        

    <!-- carousel Video debut -->
          <!--Carousel Wrapper-->
            <div id="video-carousel-example"  class="carousel slide carousel-fade" data-interval="55000" data-ride="carousel">
              <!--Indicators-->
              <ol class="carousel-indicators">
                <li data-target="#video-carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#video-carousel-example" data-slide-to="1"></li>
                <li data-target="#video-carousel-example" data-slide-to="2"></li>
              </ol>
              <!--/.Indicators-->
              <!--Slides-->
              <div class="carousel-inner " role="listbox">
                @php $si=1; @endphp
                @foreach($slides as $slide)

                  @if($slide->video==1)
                    <div class="carousel-item active">
                      <video class="d-block video-fluid w-100 h-25" autoplay loop muted>
                        <source src="{{asset('storage') . '/' . $slide->element}}"  type="video/mp4" />
                      </video>
                    </div>
                  @endif
                  @if($slide->video==0)  
                    <div class="carousel-item ">
                      <img class="d-block img-fluid w-100 h-75" src="{{asset('storage') . '/' . $slide->element}}" alt="">
                    </div>
                  @endif
                  @php $si=$si+1; @endphp
                @endforeach
              </div>
              <!--/.Slides-->
              <!--Controls-->
              <a class="carousel-control-prev" href="#video-carousel-example" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#video-carousel-example" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              <!--/.Controls-->
            </div>
<!--Carousel Wrapper-->
    <!-- carousel video fin -->

    </div>
    <!-- fin du slide -->
    <div class="container">
        <div class="row justify-content-center mb-5 ">
          <div class="animated wow zoomIn col-md-8 text-center">
            <h2 class="animated wow fadeInUp text-uppercase heading mt-5 mb-4 line-bottom text-center" data-wow-delay="1s">{{ __('service.titre') }}</h2>
            <p class="mb-3 lead">{{ __('service.description') }}</p>
          </div>
        </div>
        <div class="row mb-5 ">
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
        <!-- END row -->
        <div class="row justify-content-center ">
          <div class="col-md-4"><p><a href="{{route('service.index')}}" class="btn btn-primary btn-block animated wow bounce">{{ __('service.button') }}</a></p></div>
        </div>
      </div>

      <div>
        <section class="mt-5 border-t">
        <div class="container">
          <div class="row justify-content-center mb-5 ">
            <div class="col-md-8 text-center animated wow zoomIn">
              <h2 class="animated wow fadeInUp text-uppercase heading mb-4 line-bottom text-center" data-wow-delay="1s">{{ __('projet.titre') }}</h2>
              <p class="mb-3 lead">{{ __('projet.h3') }}</p>
              <p><a href="{{route('project')}}" class="btn btn-primary">{{ __('projet.button') }}</a></p>
            </div>
          </div>
          
          <div class="row no-gutters">
            @php $i=1; @endphp
            @foreach($projects as $project )
              <div class="col-md-4 animated wow @if($i==1)fadeInLeft @else @if($i==2)fadeInUp @else fadeInRight @endif @endif" data-wow-delay="1s">
                <a href="{{route('project.show',['projects' => $project->id])}}" class="link-thumbnail">
                  <h3>{{$project->titre}}</h3>
                  <span class="ion-plus icon"></span>
                  <img src="{{asset('storage') . '/' . $project->image1}}" alt="Image placeholder" class="img-fluid " >
                </a>
              </div>
              @php $i++; @endphp
            @endforeach
          </div>
        </div>
      </section>

      <section class="section animated wow zoomIn">
      <div id="colorlib-counter" class="colorlib-counters" style="background-image: url(image/back.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
          </div>
          <div class="row">
            <div class="col-md-3 text-center animated wow zoomIn " data-wow-delay="1s">
              <span class="icon"><i class="flaticon-skyline"></i></span>
              <span class="colorlib-counter js-counter" data-from="0" data-to="50" data-speed="5000" data-refresh-interval="50"></span>
              <span class="colorlib-counter-label">{{ __('count.projet') }}</span>
            </div>
            <div class="col-md-3 text-center animated wow zoomIn " data-wow-delay="1s">
              <span class="icon"><i class="flaticon-engineer"></i></span>
              <span class="colorlib-counter js-counter" data-from="0" data-to="130" data-speed="5000" data-refresh-interval="50"></span>
              <span class="colorlib-counter-label">{{ __('count.employe') }}</span>
            </div>
            <div class="col-md-3 text-center animated wow zoomIn " data-wow-delay="1s">
              <span class="icon"><i class="flaticon-architect-with-helmet"></i></span>
              <span class="colorlib-counter js-counter" data-from="0" data-to="90" data-speed="5000" data-refresh-interval="50"></span>
              <span class="colorlib-counter-label">{{ __('count.construction') }}</span>
            </div>
            <div class="col-md-3 text-center animated wow zoomIn " data-wow-delay="1s">
              <span class="icon"><i class="flaticon-worker"></i></span>
              <span class="colorlib-counter js-counter" data-from="0" data-to="30" data-speed="5000" data-refresh-interval="50"></span>
              <span class="colorlib-counter-label">{{ __('count.partenaire') }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="row justify-content-center mb-4 ">
          <div class="col-md-8 text-center animated wow zoomIn mb-2">
            <h2 class="animated wow fadeInUp text-uppercase heading line-bottom text-center mb-4" data-wow-delay="1s">{{ __('temoignage.titre') }}</h2>
            <p class="mb-0 lead">{{ __('temoignage.slogan') }}</p>
          
            <button data-toggle="modal" href="#ModalTemoignages" class="btn btn-primary mt-3">{{ __('temoignage.button') }}</button>
          </div>
        </div>

        <div class="row">@php $i=1; @endphp
          @foreach($temoignages as $temoignage)
            <div class="col-md-6 animated wow @if($i==1) slideInLeft @else slideInRight @endif" data-wow-delay="1s">
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
    

    <!-- <section class="section">
      <div class="">
        <div class="container">
          <div class="row mb-4">

            <div class="col-md-4 mx-auto ">
              <h2 class="line-bottom text-center animated wow rubberBand">{{ __('blog.titre') }}</h2>
            </div>

          </div>

          <div class="row">
            @foreach($articles as $article)
              <div class="col-lg-4 col-md-6 mb-4 animated wow fadeInUp" data-wow-delay="0.5s">
                <div class="post-entry-1 h-100 ">
                  <a href="{{route('article.show',['articles' => $article->id])}}">
                    <img src="{{asset('storage') . '/' . $article->image}}" class="img-fluid" alt="Image" >
                  </a>
                  <div class="post-entry-1-contents">
                    
                    <h2><a href="{{route('article.show',['article' => $article->id])}}">{{$article->titre}}</a></h2>
                    <span class="meta d-inline-block mb-3">{{Carbon\Carbon::parse($article->created_at)->formatLocalized('%d %B %Y') }}<span class="mx-2">Par</span> 
                    <span class="text-primary">{{$article->auteur}}</span></span>
                    @php  $conten = $article->contenu  @endphp

                    SI la variable contenant le texte long dépasse 20 caractères
                      @if ( strlen($conten) >= 120)

                      On l'affiche avec un bouton "Voir +" et le contenu entier en hover (title)
                      <p title="{{$conten }}">
                            {{ substr($conten, 0, 120)."......." }} On le découpe au 20ème caractères, et on écrit "..."
                        </p>
                      Sinon, on l'affiche en entier
                      @else
                        <p>{{$article->contenu}}</p>
                      @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
            <div class="row justify-content-center "> 
                <div class=""><p>
                  <a href="{{route('blog.index')}}" class="btn btn-primary btn-block animated wow shake">{{ __('blog.button') }}</a></p>
                  </div>
            </div>
        </div>
      </div>
    </section>  -->
    </div>
</div>
@endsection
