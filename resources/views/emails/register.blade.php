@component('mail::message')
# Sign up mail

Thanks you for signing up at Vikka Project.

@component('mail::button', ['url' => 'http://localhost:8000/dashboard'])
Visit Your Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
