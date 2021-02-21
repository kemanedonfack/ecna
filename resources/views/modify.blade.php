<?php $cours='admin'; 
?>

@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row p-5 mt-2 modify-form">
        <div class="col-lg-10">
            <!-- modification des informations sur un service -->
            @if($service_update == 1)
                <h3>Modifier les informations sur le service</h3>
                <form action="{{route('service.update',['service' => $services->id])}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <input type="text" name="NomService" id="NomService" class="form-control @error('NomService') is-invalid @enderror"
                            value="{{$services->nom}}">
                        @error('NomService')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="DescriptionService" id="DescriptionService" cols="30" rows="10" class="form-control">{{$services->description}}</textarea>
                        @error('DescriptionService')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="icone" id="icone" class="form-control form-control-lg">
                            @foreach($icones as $icone)
                                <option value="{{$icone->id}}" {{ $services->icone_id == $icone->id ? 'selected' : '' }}>
                                    {{$icone->nom}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sauvegarde les modifications" class="btn btn-primary">
                    </div>
                </form>
            @endif

            <!-- formulaire de modification du project -->
            @if($project_update == 1)
                <h3>Modifier les informations sur le project</h3>
                <form action="{{route('project.update',['project' => $projects->id])}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <input type="text" name="TitreProject" id="TitreProject" class="form-control mb-2 @error('TitreProject') is-invalid @enderror" 
                        placeholder="Titre du project...." value="{{$projects->titre}}">
                            @error('TitreProject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="DescriptionProject" id="DescriptionProject" cols="30" rows="10" placeholder="Description du project...." 
                        class="@error('DescriptionProject') is-invalid @enderror form-control form-control-md mb-2">{{$projects->contenu}}</textarea>
                            @error('DescriptionProject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                    
                    </div>
                    @foreach($req as $description)
                    <div class="form-group">
                        <input type="text" name="ClientProject" id="ClientProject" class="form-control mb-2 @error('ClientProject') is-invalid @enderror" 
                        placeholder="Client du project...."  value="{{$description->client}}">
                        @error('ClientProject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="LieuProject" id="LieuProject" class="form-control mb-2 @error('LieuProject') is-invalid @enderror" 
                        placeholder="Lieu du project...." value="{{$description->lieu}}">
                            @error('LieuProject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="SurfaceProject" id="SurfaceProject" class="form-control mb-2 @error('SurfaceProject') is-invalid @enderror" 
                        placeholder="Surface du project...." value="{{$description->surface}}">
                        @error('SurfaceProject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="MontantProject" id="MontantProject" class="form-control mb-2 @error('MontantProject') is-invalid @enderror" 
                        placeholder="Montant du project...." value="{{$description->montant}}">
                        @error('MontantProject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @endforeach
                    <div class="form-group">
                        <select name="categorie" id="categorie" class="form-control form-control-lg mb-2">
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}" {{ $projects->categorie_project_id == $categorie->id ? 'select' : '' }} >
                                    {{$categorie->nom}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-file mb-2">
                            <input type="file" name="image1" class="custom-file-input @error('image1') is-invalid @enderror" id="validatedCustomFile" >
                            <label class="custom-file-label" for="validatedCustomFile">Choisir une image...</label>
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
                            <label class="custom-file-label" for="validatedCustomFile">Choisir une image...</label>
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
                            <label class="custom-file-label" for="validatedCustomFile">Choisir une image...</label>
                                @error('image3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sauvegarde les modifications" class="btn btn-primary">
                    </div>
                </form>            
            @endif

            <!-- modification des informations sur un article -->
            @if($article_update == 1)
                <form action="{{route('article.update',['article' => $articles->id])}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="TitreArticle" id="TitreArticle" class="form-control mb-2 form-control  @error('TitreArticle') is-invalid @enderror" 
                            placeholder="Titre de l'article ...." value="{{$articles->titre}}">
                            @error('TitreArticle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="ContenuArticle" id="ContenuArticle" cols="30" rows="10" placeholder="Contenu de l'article ...." 
                                class="form-control form-control-md mb-2 @error('ContenuArticle') is-invalid @enderror">{{$articles->contenu}}</textarea>
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
                        <input type="submit" class="btn btn-primary col-12" value="Sauvegarde les modifications">
                    </div>
                </form>
            @endif

            <!-- modification des informations sur une formation -->
            @if($formation_update == 1)
                <form action="{{route('formation.update',['formations' => $formations->id])}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <input type="text" name="TitreFormation" id="TitreFormation" class="form-control mb-2 @error('TitreFormation') is-invalid @enderror" 
                        placeholder="Titre de la formation...."  value="{{$formations->titre}}">
                        @error('TitreFormation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="DescriptionFormation" id="DescriptionFormation" cols="30" rows="10" placeholder="Description de la formation...." 
                        class="@error('DescriptionFormation') is-invalid @enderror form-control form-control-md mb-2">{{$formations->description}}</textarea>
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
                        <input type="submit" class="btn btn-primary col-12" value="Sauvegarde les modifications">
                    </div>
                </form>
            @endif

            <!-- modification des informations sur un temoignage -->
            @if($temoignage_update==1)
            <form action="{{route('temoignage.update',['temoignage' => $temoignages->id])}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <input type="text" name="nom" id="nom" class="form-control mb-2 @error('nom') is-invalid @enderror" 
                    placeholder="Nom du client...." value="{{$temoignages->nom}}">
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="entreprise" id="entreprise" class="form-control mb-2 @error('entreprise') is-invalid @enderror" 
                    placeholder="Nom de l'entreprise...." value="{{$temoignages->entreprise}}">
                    @error('entreprise')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="temoignage" id="temoignage" cols="30" rows="10" placeholder="temoignage...." 
                    class="@error('temoignage') is-invalid @enderror form-control form-control-md mb-2">{{$temoignages->temoignage}}</textarea>
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
                    <input type="submit" class="btn btn-primary col-12" value="Sauvegarde les modifications">
                </div>
            </form>
            @endif

            @if($slide_update==1)
            <form action="{{route('slide.update',['slides' => $slides->id])}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                    <div class="form-group">
                        <textarea name="DescriptionImage" id="DescriptionImage" cols="30" rows="10" placeholder="Titre de l'image ...." 
                        class="@error('DescriptionImage') is-invalid @enderror form-control form-control-md mb-2">{{$slides->text}}</textarea>
                            @error('DescriptionImage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file mb-2">
                            <input type="file" name="ImageSlide" class="custom-file-input @error('ImageSlide') is-invalid @enderror" id="validatedCustomFile" >
                            <label class="custom-file-label" for="validatedCustomFile">Choisir une image...</label>
                                @error('ImageSlide')
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
            @endif

            @if($formationVideo_update==1)
                <form action="{{route('formationVideo.update',['formationVideo' => $formationVideo->id])}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <input type="text" name="titreFormationV" id="titreFormationV" class="form-control mb-2 @error('titreFormationV') is-invalid @enderror"
                         placeholder="titreFormationV du client...." value="{{$formationVideo->titre}}">
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
                        <input type="submit" class="btn btn-primary col-12" value="Sauvegarder les modifications">
                    </div>
                </form>
            @endif
        
            @if($formationVideoDetails_update==1)
                <form action="{{route('formationVideoDetail.update',['formationVideoDetails' => $formationVideoDetails->id])}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <select name="formationVideo" id="formationVideo" class="form-control form-control-lg mb-2">
                            @foreach($formationVideos as $formationVideo)
                                <option value="{{$formationVideo->id}}" {{ $formationVideo->id == $formationVideoDetails->formrmation_video_id ? 'selected' : '' }}>
                                    {{$formationVideo->titre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lienVideo" id="lienVideo" class="form-control mb-2 @error('lienVideo') is-invalid @enderror" 
                        placeholder="Entrer le lien vers la vidéo...." value="{{$formationVideoDetails->lien}}">
                        @error('lienVideo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary col-12" value="Sauvergarder les modifications">
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection