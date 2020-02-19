@extends('layouts.admin')

@section('title', 'All medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">

        <div class="h3">
            {{$medicine->brand_name}} <small title="Dosage Form">{{$medicine->dosage_form}}</small>
        </div>
        <div title="Generic">
            <a href="{{ route('generic.show',$generic->id)}}"> {{ $generic->generic_name}}</a>
        </div>
        <div title="Strength" class="h5 text-secondary">
            {{$medicine->strength}}
        </div>
        <div title="Company" class="h5 text-secondary">
            {{$medicine->company}}
        </div>
        <div title="Price" class="h5 text-secondary">
            Unit Price: ৳ {{$medicine->price}}
        </div>

        @foreach($generic_info as $key => $value)
        @if($value)
        <div class="col-md-12 m-0 p-0">
            <div class="card mb-3 mt-3">
                <div class="card-body bg-dark text-white">{{$key}}</div>
                <div class="card-body">
                    {{$value}}
                </div>
            </div>
        </div>
        @endif
        @endforeach


    </div>
</div>


@endsection