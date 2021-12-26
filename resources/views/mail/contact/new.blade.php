@component('mail::message')
    <h3>Olá! {{ $name }}</h3>

    {{ $message }}

    <br>

    Thanks, {{ config('app.name') }}
@endcomponent
