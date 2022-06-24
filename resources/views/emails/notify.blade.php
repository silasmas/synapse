@component('mail::message')
# Bonjour {{ $user->name }}

@component('mail::panel')
Vous avez un nouveau message provenant d'un visiteur sur le site.
Merci de vous connectez comme administrateur pour le voir.
@endcomponent

@component('mail::button', ['url' => config('app.url')."/login"])
Aller sur la partie admin
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
