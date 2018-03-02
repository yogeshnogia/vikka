@component('mail::message')
# Thank you for registering at Vikka Project

Click on the link to verify your account
{{url(‘/verifyemail/’.$email_token)}}

or click on the button

@component('mail::button', ['url' => "{{url('/verifyemail/'.$email_token)}}"])
Verify yourr account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
