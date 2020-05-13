@component('mail::message')
Hola!

{{ $invited_by }} t'ha convidat a col·laborar al projecte <b>{{ $project->name }}</b>.<br>
Si voleu participar, premeu el botó.

@component('mail::button', ['url' => $url ])
Unir-me!
@endcomponent

Si el botó no funciona, copia aquest enllaç al navegador.
<a href="{{ $url }}" target="_blank">{{ $url }}</a>

Gràcies,<br>
{{ config('app.name') }}
@endcomponent
