@component('mail::message')
# {{ $content['title'] }}



{{ $content['body'] }}

@component('mail::button', ['url' => $content['url'] ] )
{{ $content['button'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
