@component('mail::message')
# Sorry {{$data->name}} ,

{{$data->message}} <br><br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
