@component('mail::message')
# Medicine Approved

Congratulation {{$data->name}}, Your Medicine Has Been Approved.

@component('mail::button', ['url' => $data->url ])
Check Your Medicine
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
