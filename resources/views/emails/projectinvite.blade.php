@component('mail::message')
Hola!

{{ $invited_by }} t'ha convidat a col·laborar al projecte <b>{{ $project->name }}</b>.<br>
Si voleu participar, premeu el botó.

@component('mail::button', ['url' => $url ])
Unir-me!
@endcomponent

Gràcies,<br>
{{ config('app.name') }}
@endcomponent
