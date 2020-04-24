@component('mail::message')
# Doctor Account Created

Congratulation {{$data['name']}}, Your Account Has Been Created.

Your, <br>
Username: {{$data['username']}} <br>
Password: {{$data['password']}} 

@component('mail::button', ['url' => url('/download/doctor/software') ])
Download Your Software
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
