@component('mail::message')


welcome in my laravel training 


@component('mail::button', ['url' => ''])

Browse laravel

@endcomponent

@component('mail::panel', ['url' => ''])

Test markdown mail.

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
