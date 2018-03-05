@component('mail::message')
# Password reset link 

Click on the link to reset your password
{{url('/password-reset/'.urlencode($token))}}

or click on the button

@component('mail::button', ['url' => "'".{{url('/password-reset/'.urlencode($token))}}."'"])
Reset your password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
