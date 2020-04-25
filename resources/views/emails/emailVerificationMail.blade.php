@component('mail::message')
# Hello {{$data->name}} ,

You have applied for doctor authorization <br>
Please click the verify email button to verify your email

@component('mail::button', ['url' => $data->url ])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
