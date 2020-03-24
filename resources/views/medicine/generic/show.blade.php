@extends('layouts.admin')

@section('title', 'All medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
   
        <div title="Generic">
             <div class="h1 text-secondary mb-3 pb-3">{{ $generic->generic_name}}</div>
        </div>
        
        <a class="btn btn-info mb-3" href="{{ route('medicine.genericBased', $generic->id)}}">View All Brand Names</a>
        @foreach($generic_info as $key => $value)
        @if($value)
        <div class="col-md-12 m-0 p-0">
            <div class="card mb-3 mt-3">
                <div class="card-body bg-dark text-white">{{$key}}</div>
                <div class="card-body">
                {!! nl2br($value) !!}
                </div>
            </div>
        </div>
        @endif
        @endforeach


    </div>
</div>


@endsection