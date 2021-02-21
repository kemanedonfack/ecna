<?php $cours='admin'; 
?>
@extends('layouts.app')

@section('content')
 
<section class="">
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="bg-dark nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active mb-4 " id="v-pills-acceuil-tab" data-toggle="pill" href="#v-pills-acceuil" role="tab" aria-controls="v-pills-acceuil" aria-selected="true">acceuil </a>
            <a class="nav-link mb-4 " id="v-pills-service-tab" data-toggle="pill" href="#v-pills-service" role="tab" aria-controls="v-pills-service" aria-selected="false">Services </a>
            <a class="nav-link mb-4 " id="v-pills-project-tab" data-toggle="pill" href="#v-pills-project" role="tab" aria-controls="v-pills-project" aria-selected="false">Projects </a>
            <a class="nav-link mb-4 " id="v-pills-blog-tab" data-toggle="pill" href="#v-pills-blog" role="tab" aria-controls="v-pills-blog" aria-selected="false">Blogs </a>
            <a class="nav-link mb-4 " id="v-pills-formation-tab" data-toggle="pill" href="#v-pills-formation" role="tab" aria-controls="v-pills-formation" aria-selected="false">Formations </a>
            <a class="nav-link mb-4 " id="v-pills-temoignage-tab" data-toggle="pill" href="#v-pills-temoignage" role="tab" aria-controls="v-pills-temoignage" aria-selected="false">Témoignage </a>
            <a class="nav-link mb-4 " id="v-pills-FormationVideo-tab" data-toggle="pill" href="#v-pills-FormationVideo" role="tab" aria-controls="v-pills-FormationVideo" aria-selected="false">Formation Vidéo </a>
            <a class="nav-link mb-4 " id="v-pills-slide-tab" data-toggle="pill" href="#v-pills-slide" role="tab" aria-controls="v-pills-slide" aria-selected="false">slides </a>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-acceuil" role="tabpanel" aria-labelledby="v-pills-acceuil-tab">
                <div class="row">
                    <div class="col-lg-12 mt-3">
                    @if(session()->has('formation'))
                        <div class="col-5 alert alert-success" role="alert">
                            {{ session()->get('formation') }}
                        </div>
                    @endif
                    @if(session()->has('project'))
                        <div class="col-5 alert alert-success" role="alert">
                            {{ session()->get('project') }}
                        </div>
                    @endif
                    @if(session()->has('article'))
                        <div class="col-5 alert alert-success" role="alert">
                            {{ session()->get('article') }}
                        </div>
                    @endif
                    @if(session()->has('temoignage'))
                        <div class="col-5 alert alert-success" role="alert">
                            {{ session()->get('temoignage') }}
                        </div>
                    @endif
                    @if(session()->has('service'))
                        <div class="col-5 alert alert-success" role="alert">
                            {{ session()->get('service') }}
                        </div>
                    @endif
                    
                        <h2>Panneau d'administration ECNA</h2>
                        <p class="text-muted mt-5">
                            <span class="font-weight-bold">Mot de Passe pour visionner les videos</span><br>
                            <span> {{ $video->PasswordVideo }} </span>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="v-pills-temoignage" role="tabpanel" aria-labelledby="v-pills-temoignage-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> 
                    <li class="nav-item"> 
                        <a class="nav-link active" id="pills-SeeTemoignage-tab" data-toggle="pill" href="#pills-SeeTemoignage" role="tab" aria-controls="pills-SeeTemoignage" aria-selected="true">
                            Voir les temoignages
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" id="pills-AdTemoignage-tab" data-toggle="pill" href="#pills-AdTemoignage" role="tab" aria-controls="pills-AdTemoignage" aria-selected="false">
                            Ajouter un temoignage
                        </a> 
                    </li>
                </ul> 
                <div class="tab-content" id="pills-tabContent"> 
                    <div class="tab-pane fade show active" id="pills-SeeTemoignage" role="tabpanel" aria-labelledby="pills-SeeTemoignage-tab">
                        <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">
                        Listes des témoignages
                        </h2>
                        <div class="row">
                            @foreach($temoignages as $temoignage)
                                <div class="col-lg-4 col-sm-4 col-md-4 mb-1 w-100">
                                    <div class="card shadow">
                            
                                        <img src="{{asset('storage') . '/' . $temoignage->image}}" class="p-1 img-fluid" >
                                        <div class="card-body">
                                                
                                            <p class=" ">{{$temoignage->nom}}, <span class="text-primary font-weight-bold">{{$temoignage->entreprise}}.</span> </p>
                                            <p class="card-text">{{$temoignage->temoignage}}..</p>
                                            <p>
                                                <a href="{{route('temoignage.delete',['temoignage' => $temoignage->id])}}"><span class="btn btn-outline-danger btn-sm">supprimer</span></a>
                                                <a href="{{route('temoignage.modify',['temoignage' => $temoignage->id])}}"><span class="btn btn-outline-primary btn-sm ">modifier</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-AdTemoignage" role="tabpanel" aria-labelledby="pills-AdTemoignage-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{route('temoignage.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="nom" id="nom" class="form-control mb-2 @error('nom') is-invalid @enderror" placeholder="Nom du client....">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="entreprise" id="entreprise" class="form-control mb-2 @error('entreprise') is-invalid @enderror" placeholder="Nom de l'entreprise....">
                                        @error('entreprise')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea name="temoignage" id="temoignage" cols="30" rows="10" placeholder="temoignage...." class="@error('temoignage') is-invalid @enderror form-control form-control-md mb-2"></textarea>
                                        @error('temoignage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file mb-2">
                                            <input type="file" name="PhotoClient" class="custom-file-input @error('PhotoClient') is-invalid @enderror" id="validatedCustomFile" >
                                            <label class="custom-file-label" for="validatedCustomFile">Choisir une photo...</label>
                                            @error('PhotoClient')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary col-12" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="tab-pane fade" id="v-pills-FormationVideo" role="tabpanel" aria-labelledby="v-pills-FormationVideo-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> 
                    <li class="nav-item"> 
                        <a class="nav-link active" id="pills-SeeFormationVideo-tab" data-toggle="pill" href="#pills-SeeFormationVideo" role="tab" aria-controls="pills-SeeFormationVideo" aria-selected="true">
                            Voir les Formations Vidéo
                        </a> 
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" id="pills-AdFormationVideo-tab" data-toggle="pill" href="#pills-AdFormationVideo" role="tab" aria-controls="pills-AdFormationVideo" aria-selected="false">
                            Ajouter une Formations Vidéo
                        </a> 
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" id="pills-AdFormationVideoDetails-tab" data-toggle="pill" href="#pills-AdFormationVideoDetails" role="tab" aria-controls="pills-AdFormationVideoDetails" aria-selected="false">
                            Ajouter une Vidéo
                        </a> 
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" id="pills-SeeFormationVideoDetails-tab" data-toggle="pill" href="#pills-SeeFormationVideoDetails" role="tab" aria-controls="pills-SeeFormationVideoDetails" aria-selected="true">
                            Voir les Vidéos
                        </a> 
                    </li> 
                </ul> 
                <div class="tab-content" id="pills-tabContent"> 
                    <div class="tab-pane fade show active" id="pills-SeeFormationVideo" role="tabpanel" aria-labelledby="pills-SeeFormationVideo-tab">
                        <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">
                            Listes des formations Vidéos
                        </h2>
                        <div class="row">
                            @foreach($formationVideos as $formationVideo)
                                <div class="col-lg-4 col-sm-4 col-md-4 mb-1 w-100">
                                    <div class="card shadow">
                            
                                        <img src="{{asset('storage') . '/' . $formationVideo->image}}" class="p-1 img-fluid" >
                                        <div class="card-body">
                                            <p class=" ">{{$formationVideo->titre}}<p>
                                            <p>
                                                <a href="{{route('formationVideo.delete',['formationVideo' => $formationVideo->id])}}"><span class="btn btn-outline-danger btn-sm">supprimer</span></a>
                                                <a href="{{route('formationVideo.modify',['formationVideo' => $formationVideo->id])}}"><span class="btn btn-outline-primary btn-sm ">modifier</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="pills-SeeFormationVideoDetails" role="tabpanel" aria-labelledby="pills-SeeFormationVideoDetails-tab">
                        <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">
                            Listes les Vidéos
                        </h2>
                        <div class="row">
                            @foreach($formationVideoDetails as $formationVideoDetail)
                                <div class="col-lg-4 col-sm-4 col-md-4 mb-1 w-100">
                                    <div class="card shadow">
                                         <img class="img-fluid" src="{{asset('storage') . '/' . $formationVideoDetail->image}}" alt="">
                                        <div class="card-body">
                                            <p>
                                                <a href="{{route('formationVideoDetail.delete',['formationVideoDetail' => $formationVideoDetail->id])}}"><span class="btn btn-outline-danger btn-sm">supprimer</span></a>
                                                <a href="{{route('formationVideoDetail.modify',['formationVideoDetail' => $formationVideoDetail->id])}}"><span class="btn btn-outline-primary btn-sm ">modifier</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-AdFormationVideo" role="tabpanel" aria-labelledby="pills-AdFormationVideo-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{route('formationVideo.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="titreFormationV" id="titreFormationV" class="form-control mb-2 @error('titreFormationV') is-invalid @enderror" placeholder="titreFormationV du client....">
                                        @error('titreFormationV')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file mb-2">
                                            <input type="file" name="imageFormationV" class="custom-file-input @error('imageFormationV') is-invalid @enderror" id="validatedCustomFile" >
                                            <label class="custom-file-label" for="validatedCustomFile">Choississez l'image principal ici ...</label>
                                            @error('imageFormationV')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary col-12" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-AdFormationVideoDetails" role="tabpanel" aria-labelledby="pills-AdFormationVideoDetails-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{route('formationVideoDetails.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <select name="formationVideo" id="formationVideo" class="form-control form-control-lg mb-2">
                                            @foreach($formationVideos as $formationVideo)
                                                <option value="{{$formationVideo->id}}">{{$formationVideo->titre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lienVideo" id="lienVideo" class="form-control mb-2 @error('lienVideo') is-invalid @enderror" placeholder="Entrer le lien vers la vidéo....">
                                        @error('lienVideo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file mb-2">
                                            <input type="file" name="imageVideo" class="custom-file-input @error('imageVideo') is-invalid @enderror" id="validatedCustomFile" >
                                            <label class="custom-file-label" for="validatedCustomFile">Choississez une image pour la vidéo  ...</label>
                                            @error('imageVideo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary col-12" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="tab-pane fade" id="v-pills-service" role="tabpanel" aria-labelledby="v-pills-service-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> 
                    <li class="nav-item"> 
                        <a class="nav-link active" id="pills-SeeService-tab" data-toggle="pill" href="#pills-SeeService" role="tab" aria-controls="pills-SeeService" aria-selected="true">
                            Voir les services
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" id="pills-AdService-tab" data-toggle="pill" href="#pills-AdService" role="tab" aria-controls="pills-AdService" aria-selected="false">
                            Ajouter un service
                        </a> 
                    </li>
                </ul>  
            <div class="tab-content" id="pills-tabContent"> 
                <div class="tab-pane fade show active" id="pills-SeeService" role="tabpanel" aria-labelledby="pills-SeeService-tab">
                    <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">
                        Listes des Services
                    </h2>
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-lg-4 col-md-6 col-12 mb-3 ">
                                <div class="media d-block media-feature text-center">
                                    <span class="{{$service->icone->valeur}} icon"></span>
                                    <div class="media-body">
                                        <h3 class="mt-0 text-black">{{$service->nom}}</h3>
                                        <p>{{$service->description}}</p>
                                        <p>
                                            <a href="{{route('service.delete',['services' => $service->id])}}"><span class="btn btn-outline-danger btn-sm">supprimer</span></a>
                                            <a href="{{route('service.modify',['services' => $service->id])}}"><span class="btn btn-outline-primary btn-sm ">modifier</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-AdService" role="tabpanel" aria-labelledby="pills-AdService-tab">
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="{{route('service.store')}}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <input type="text" name="NomService" id="NomService" class="form-control mb-2 @error('NomService') is-invalid @enderror" placeholder="Nom du service....">
                                        @error('NomService')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea name="DescriptionService" id="DescriptionService" cols="30" rows="10" placeholder="Description du services...." class="@error('DescriptionService') is-invalid @enderror form-control form-control-md mb-2"></textarea>
                                        @error('DescriptionService')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="icone" id="icone" class="form-control form-control-lg mb-2">
                                            @foreach($icones as $icone)
                                                <option value="{{$icone->id}}">{{$icone->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="col-12 btn btn-primary" value="Ajouter">
                                    </div>                                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
<!-- project  -->
            <div class="tab-pane fade" id="v-pills-project" role="tabpanel" aria-labelledby="v-pills-project-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> 
                <li class="nav-item"> 
                    <a class="nav-link active" id="pills-SeeProject-tab" data-toggle="pill" href="#pills-SeeProject" role="tab" aria-controls="pills-SeeProject" aria-selected="true">
                        Voir les project
                    </a> 
                </li> 
                <li class="nav-item"> 
                    <a class="nav-link" id="pills-AdProject-tab" data-toggle="pill" href="#pills-AdProject" role="tab" aria-controls="pills-AdProject" aria-selected="false">
                        Ajouter un project
                    </a> 
                </li> 
                <li class="nav-item"> 
                    <a class="nav-link" id="pills-CategorieProject-tab" data-toggle="pill" href="#pills-CategorieProject" role="tab" aria-controls="pills-CategorieProject" aria-selected="false">
                        Catégories des projects
                    </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" id="pills-AllCategorieProject-tab" data-toggle="pill" href="#pills-AllCategorieProject" role="tab" aria-controls="pills-AllCategorieProject" aria-selected="false">
                        Différentes Catégories de projects
                    </a> 
                </li> 
            </ul> 
            <div class="tab-content" id="pills-tabContent"> 
                <div class="tab-pane fade show active" id="pills-SeeProject" role="tabpanel" aria-labelledby="pills-SeeProject-tab">
                    <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">
                        Listes des Projects
                    </h2>
                    <div class="row no-gutters">
                        @foreach($projects as $project )
                            <div class="col-md-4 col-sm-6 mb-2">
                                <a href="{{route('project.show',['projects' => $project->id])}}" class="link-thumbnail">
                                    <div class="link-thumbnail">
                                        <h3>{{$project->titre}}</h3>
                                        <a href="{{route('project.delete',['projects' => $project->id])}}"><span class="ion-close icon ml-5 trois "></span></a>
                                        <a href="{{route('project.modify',['projects' => $project->id])}}"><span class="ion-edit icon trois "></span></a>
                                        <img src="{{asset('storage') . '/' . $project->image1}}" alt="Image placeholder" class="img-fluid">
                                    </div>
                                </a>    
                            </div>
                        @endforeach 
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-AdProject" role="tabpanel" aria-labelledby="pills-AdProject-tab">
                    <div class="row">
                        <div class="col-lg-8">
                        <form action="{{route('project.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" name="TitreProject" id="TitreProject" class="form-control mb-2 @error('TitreProject') is-invalid @enderror" placeholder="Titre du project....">
                                    @error('TitreProject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="ClientProject" id="ClientProject" class="form-control mb-2 @error('ClientProject') is-invalid @enderror" placeholder="Client du project....">
                                    @error('ClientProject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="LieuProject" id="LieuProject" class="form-control mb-2 @error('LieuProject') is-invalid @enderror" placeholder="Lieu du project....">
                                    @error('LieuProject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="number" name="SurfaceProject" id="SurfaceProject" class="form-control mb-2 @error('SurfaceProject') is-invalid @enderror" placeholder="Surface du project....">
                                    @error('SurfaceProject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="number" name="MontantProject" id="MontantProject" class="form-control mb-2 @error('MontantProject') is-invalid @enderror" placeholder="Montant du project....">
                                    @error('MontantProject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea name="DescriptionProject" id="DescriptionProject" cols="30" rows="10" placeholder="Description du project...." class="@error('DescriptionProject') is-invalid @enderror form-control form-control-md mb-2"></textarea>
                                    @error('DescriptionProject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                        <select name="categorie" id="categorie" class="form-control form-control-lg mb-2">
                                            @foreach($categories as $categorie)
                                                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file mb-2">
                                        <input type="file" name="image1" class="custom-file-input @error('image1') is-invalid @enderror" id="validatedCustomFile" >
                                        <label class="custom-file-label" for="validatedCustomFile">Choississez l'image principal ici ...</label>
                                    @error('image1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file mb-2">
                                        <input type="file" name="image2" class="custom-file-input @error('image2') is-invalid @enderror" id="validatedCustomFile" >
                                        <label class="custom-file-label" for="validatedCustomFile">Choisir une image secondaire ...</label>
                                        
                                    @error('image2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file mb-2">
                                        <input type="file" name="image3" class="custom-file-input @error('image3') is-invalid @enderror" id="validatedCustomFile" >
                                        <label class="custom-file-label" for="validatedCustomFile">Choisir une image secondaire ...</label>
                                    @error('image3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary col-12" value="Ajouter">
                            </div>
                        </form> 
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-CategorieProject" role="tabpanel" aria-labelledby="pills-CategorieProject-tab">
                    <div class="row">
                        <div class="col-lg-8">
                        <form action="{{route('categorie.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" name="categorie" id="categorie" class="form-control mb-2 @error('categorie') is-invalid @enderror" placeholder="Titre de la catégorie....">
                                    @error('categorie')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-file mb-2">
                                        <input type="file" name="imageCategorie" class="custom-file-input @error('imageCategorie') is-invalid @enderror" id="validatedCustomFile" >
                                        <label class="custom-file-label" for="validatedCustomFile">Choississez l'image principal ici ...</label>
                                    @error('imageCategorie')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary col-12" value="Ajouter">
                            </div>
                        </form> 
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-AllCategorieProject" role="tabpanel" aria-labelledby="pills-AllCategorieProject-tab">
                    <div class="row">
                        @foreach($categories as $categorie)
                            <div class="col-lg-4 mb-2">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('storage') . '/' . $categorie->image}}" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$categorie->nom}}</h5>
                                        <p class="card-text">
                                        <a class="btn btn-outline-danger btn-sm " href="{{route('categorie.delete',['categories' => $categorie->id])}}">Supprimer</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>  
            </div>      
            </div>
            <div class="tab-pane fade" id="v-pills-blog" role="tabpanel" aria-labelledby="v-pills-blog-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> 
                    <li class="nav-item"> 
                        <a class="nav-link active" id="pills-SeeArticle-tab" data-toggle="pill" href="#pills-SeeArticle" role="tab" aria-controls="pills-SeeArticle" aria-selected="true">
                            Voir les articles
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" id="pills-AdArticle-tab" data-toggle="pill" href="#pills-AdArticle" role="tab" aria-controls="pills-AdArticle" aria-selected="false">
                            Ajouter un article
                        </a> 
                    </li>
                </ul> 
                <div class="tab-content" id="pills-tabContent"> 
                    <div class="tab-pane fade show active" id="pills-SeeArticle" role="tabpanel" aria-labelledby="pills-SeeArticle-tab">
                        <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">
                            Listes des Articles
                        </h2>
                        <div class="row">
                            @foreach($articles as $article)
                                <div class="col-lg-4 col-md-6 mb-4 ">
                                    <div class="post-entry-1 h-100 ">
                                    <a href="{{route('article.show',['articles' => $article->id])}}">
                                        <img src="{{asset('storage') . '/' . $article->image}}" alt="Image" width="340px" height="290px" >
                                    </a>
                                    <div class="post-entry-1-contents">
                                        
                                        <h2><a href="{{route('article.show',['articles' => $article->id])}}">{{$article->titre}}</a></h2>
                                        <span class="meta d-inline-block mb-3">{{$article->created_at->formatLocalized('%d %B %Y')}}<span class="mx-2">Par</span> 
                                        <a href="#">{{$article->auteur}}</a></span>
                                        <p>{{$article->contenu}}.</p>
                                        <p>
                                            <a href="{{route('article.modify',['articles' => $article->id])}}" class="btn btn-outline-primary btn-sm">modifier</a>
                                            <a href="{{route('article.delete',['articles' => $article->id])}}" class="btn btn-outline-danger btn-sm">Supprimer</a>
                                        </p>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-AdArticle" role="tabpanel" aria-labelledby="pills-AdArticle-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="TitreArticle" id="TitreArticle" class="form-control mb-2 form-control  @error('TitreArticle') is-invalid @enderror" placeholder="Titre de l'article ....">
                                            @error('TitreArticle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <textarea name="ContenuArticle" id="ContenuArticle" cols="30" rows="10" placeholder="Contenu de l'article ...." 
                                            class="form-control form-control-md mb-2 @error('ContenuArticle') is-invalid @enderror"></textarea>
                                            @error('ContenuArticle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" name="ImageArticle" class="custom-file-input @error('ImageArticle') is-invalid @enderror" id="validatedCustomFile" >
                                                <label class="custom-file-label" for="validatedCustomFile">Choisir un fichier...</label>
                                                
                                            @error('ImageArticle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <input type="submit" class="btn btn-primary col-12" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>    
            </div>
            <div class="tab-pane fade" id="v-pills-formation" role="tabpanel" aria-labelledby="v-pills-formation-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> 
                    <li class="nav-item"> 
                        <a class="nav-link active" id="pills-SeeFormation-tab" data-toggle="pill" href="#pills-SeeFormation" role="tab" aria-controls="pills-SeeFormation" aria-selected="true">
                            Voir les formations
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" id="pills-AdFormation-tab" data-toggle="pill" href="#pills-AdFormation" role="tab" aria-controls="pills-AdFormation" aria-selected="false">
                            Ajouter une formation
                        </a> 
                    </li> 
                </ul> 
                <div class="tab-content" id="pills-tabContent"> 
                    <div class="tab-pane fade show active" id="pills-SeeFormation" role="tabpanel" aria-labelledby="pills-SeeFormation-tab">
                    <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">
                        Listes des Formations
                    </h2>
                    <div class="row">
                        @foreach($formations as $formation)
                            <div class="col-lg-4 col-md-6 col-12 mb-3 ">
                                <div class="media d-block media-feature text-center">
                                    <span class="flaticon-engineer icon"></span>
                                    <div class="media-body">
                                        <h3 class="mt-0 text-black">{{$formation->titre}}</h3>
                                        <p>{{$formation->description}}</p>
                                        <p>
                                            <a href="{{route('formation.modify',['formations' => $formation->id])}}" class="btn btn-outline-primary btn-sm">modifier</a>
                                            <a href="{{route('formation.delete',['formations' => $formation->id])}}" class="btn btn-outline-danger btn-sm">Supprimer</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </div>
                    <div class="tab-pane fade" id="pills-AdFormation" role="tabpanel" aria-labelledby="pills-AdFormation-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{route('formation.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="TitreFormation" id="TitreFormation" class="form-control mb-2 @error('TitreFormation') is-invalid @enderror" placeholder="Titre de la formation....">
                                            @error('TitreFormation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea name="DescriptionFormation" id="DescriptionFormation" cols="30" rows="10" placeholder="Description de la formation...." class="@error('DescriptionFormation') is-invalid @enderror form-control form-control-md mb-2"></textarea>
                                        @error('DescriptionFormation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file mb-2">
                                            <input type="file" name="ImageFormation" class="custom-file-input @error('ImageFormation') is-invalid @enderror" id="validatedCustomFile" >
                                            <label class="custom-file-label" for="validatedCustomFile">Choisir une image...</label>
                                            @error('ImageFormation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary col-12" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            <!-- slideshow -->
            <div class="tab-pane fade" id="v-pills-slide" role="tabpanel" aria-labelledby="v-pills-slide-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"> 
                    <li class="nav-item"> 
                        <a class="nav-link active" id="pills-SeeSlide-tab" data-toggle="pill" href="#pills-SeeSlide" role="tab" aria-controls="pills-SeeSlide" aria-selected="true">
                            Voir les images du slide
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" id="pills-AdSlide-tab" data-toggle="pill" href="#pills-AdSlide" role="tab" aria-controls="pills-AdSlide" aria-selected="false">
                            Ajouter une images
                        </a> 
                    </li> 
                </ul> 
                <div class="tab-content" id="pills-tabContent"> 
                    <div class="tab-pane fade show active" id="pills-SeeSlide" role="tabpanel" aria-labelledby="pills-SeeSlide-tab">
                        <h2 class="text-uppercase heading mt-5 mb-4 line-bottom text-center">
                            Listes des images
                        </h2>
                        <div class="row">
                            @foreach($slides as $slide)
                                @if($slide->video==0)
                                <div class="col-lg-4 mb-5">
                                    <div class="card shadow">
                                        <img src="{{asset('storage') . '/' . $slide->element}}" class="w-100" alt="">
                                        <div class="card-bordy p-2">
                                            <div class="card-text mb-2">
                                                {{$slide->text}}
                                            </div>
                                            <a href="{{route('slide.delete',['slides' => $slide->id])}}" class="btn btn-outline-danger btn-sm">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($slide->video==1)
                                <div class="col-lg-4 mb-5">
                                    <div class="card shadow">
                                        <video class="video-fluid w-100" autoplay loop muted>
                                            <source src="{{asset('storage') . '/' . $slide->element}}"  type="video/mp4" />
                                        </video>
                                        <div class="card-bordy p-2">
                                            <div class="card-text mb-2">
                                                {{$slide->text}}
                                            </div>
                                            <a href="{{route('slide.delete',['slides' => $slide->id])}}" class="btn btn-outline-danger btn-sm">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-AdSlide" role="tabpanel" aria-labelledby="pills-AdSlide-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{route('slide.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="DescriptionImage" id="DescriptionImage" cols="30" rows="10" placeholder="Titre de l'image ...." class="@error('DescriptionImage') is-invalid @enderror form-control form-control-md mb-2"></textarea>
                                        @error('DescriptionImage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file mb-2">
                                            <input type="file" name="ItemSlide" class="custom-file-input @error('ItemSlide') is-invalid @enderror" id="validatedCustomFile" >
                                            <label class="custom-file-label" for="validatedCustomFile">Choisir un élément...</label>
                                            @error('ItemSlide')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="element" id="element" class="form-control mb-2 p-2">
                                            <option value="1">insérer une video</option>
                                            <option value="0">insérer une image</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary col-12" value="Ajouter">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Formations
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <form action="{{route('formation.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une formation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" name="titre" id="titre" class="form-control mb-2" placeholder="Titre de la formation....">
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description de la formation...." class="form-control form-control-md mb-2"></textarea>
            <div class="custom-file mb-2">
                <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" >
                <label class="custom-file-label" for="validatedCustomFile">Choisir une image...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
        </div>
        <div class="modal-footer">
            
            <input type="submit" class="btn btn-primary" value="Ajouter">
        </div>
      </form>
    </div>
  </div>
</div> -->

<!-- Modal Services
<div class="modal fade" id="ModalService" tabindex="-1" role="dialog" aria-labelledby="ModalServiceTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <form action="{{route('formation.store')}}" method="post">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="ModalServiceTitle">Ajouter un témoigna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" name="titre" id="titre" class="form-control mb-2" placeholder="Titre du service....">
            <textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Description du services...." class="form-control form-control-md mb-2"></textarea>
            <select name="icone" id="icon" class="form-control mb-2">
                <option value=""></option>
            </select>
        </div>
        <div class="modal-footer">
            
            <input type="submit" class="btn btn-primary" value="Ajouter">
        </div>
      </form>
    </div>
  </div>
</div> -->


<!-- Modal Témoignage
 -->


@endsection
