@extends('layouts.medicine')

@section('title', 'Generic Info')

@section('subcontent')
<div class="row">
    <div class="col-md-7 mt-3">

        <div title="Generic">
            <div class="h1 text-secondary mb-3 pb-3">{{ $generic->generic_name}}</div>
        </div>

        <a class="btn btn-info mb-3" href="{{ route('publicMedicine.genericBased', $generic->id)}}">View All Brand
            Names</a>
        @foreach($generic_info as $key => $value)
        @if($value)
        <div class="col-md-12 m-0 p-0">
            <div class=" mb-3 mt-3">
                <div class="card-header bg-secondary text-white">{{$key}}</div>
                <div class="card-body">
                    {!! nl2br($value) !!}
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <div class="col-md-4 mt-3 ml-3">
        <div class="h2 text-black-50">Available Brand Names</div>
        <div class="row">
            @foreach ($meds as $med)
            <div class="col-md-12  mt-3">
                <div class="card-med">
                    <div class="card-body">
                        <a href="{{ route('publicMedicine.show', $med->id) }}">
                            <div class="h4 med-info">
                                <div class="text-dark">{{ $med->brand_name }} <small> {{ $med->strength}} </small></div>
                            </div>
                            <div class="h6 med-info">
                                {{ $med->dosage_form}}
                                <div class="med-info text-primary">{{ $med->company}}</div>
                                <div class="med-info text-success">Unit Price: {{ $med->price}}</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection