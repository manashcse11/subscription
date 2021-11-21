@component('mail::message')
{{ __('Hello :name', ['name' => $name]) }}

{{ $title }}

{{ $description }}

{{ __('Thank you for subscription!') }}

{{ __('Regards')}},<br>
{{ config('app.name') }}
@endcomponent
