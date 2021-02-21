@component('mail::message')
Nouvelle demande de stage en {{ $data['formation'] }} de {{ $data['nom'] }} {{ $data['prenom'] }} 
Coordonnées : {{ $data['numero'] }} {{ $data['adresse'] }} {{ $data['email'] }} 
 
<p><a href="{{asset('storage') . '/' . $fichier }}" >Télécharger la demande</a></p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
