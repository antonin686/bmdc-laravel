@extends('layouts.medicine')

@section('title', 'All medicine')

@section('subcontent')
<div class="row">
    <div class="col-md-12 mt-3">

        <div class="row">
            <div class="col-md-6">
                <div class="h3">
                    {{$medicine->brand_name}} <small title="Dosage Form">{{$medicine->dosage_form}}</small>
                </div>
                <div title="Generic">
                    <a class="m-0 p-0" href="{{ route('publicMedicine.genericShow',$generic->id)}}">
                        {{ $generic->generic_name}}</a>
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
            </div>
            <div class="col-md-6">
                <div class="card">
                    <img src="{{$medicine->img_path}}" class="card-img-top" alt="medicine image">
                </div>
            </div>

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