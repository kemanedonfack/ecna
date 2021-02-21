@component('mail::message')

Salut <span class="font-weight-bold">{{ $data['nom'] }}</span>

<div>
    Felicitation votre inscription a {{ config('app.name') }} à bien été enregistrée  
    nous vous souhaitons la bienvenue à Ecna Cameroun
</div>
<a class="btn btn-primary mr-2 mt-2" href="{{ route('formation.index') }}">Nos formations</a>
<a class="btn btn-primary mr-2 mt-2" href="{{route('service.index')}}">Nos services</a>
<a class="btn btn-primary mr-2 mt-2" href="{{ route('project') }}">Nos projects</a>


Merci,<br>
{{ config('app.name') }}
@endcomponent
