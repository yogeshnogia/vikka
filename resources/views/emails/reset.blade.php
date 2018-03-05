@component('mail::message')
# Introduction

Click on the link to verify your account
{{url('/reset-password/'.urlencode($token))}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
