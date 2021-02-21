@component('mail::message')
Nouveau message de {{ $data['nom'] }} avec pour adresse email {{ $data['email'] }}

message
{{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
