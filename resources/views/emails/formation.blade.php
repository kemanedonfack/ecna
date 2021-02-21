@component('mail::message')

{{ $data['nom'] }} {{ $data['prenom'] }} Souhaite faire une formation en {{ $data['formation'] }}
Coordonnées : {{ $data['numero'] }} {{ $data['adresse'] }} {{ $data['email'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
