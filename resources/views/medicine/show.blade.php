@extends('layouts.admin')

@section('title', 'Medicine Info')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Medicine Info</div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-body">
                            <table class="table" id="table">
                                <tbody>
                                    <tr class="bg-dark text-light">
                                        <th>#</th>
                                        <td>{{ $medicine->id }}</td>
                                    </tr>

                                    <tr>
                                        <th>Brand Name</th>
                                        <td>{{ $medicine->brand_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Dosage Form</th>
                                        <td>{{ $medicine->dosage_form }}</td>
                                    </tr>

                                    <tr>
                                        <th>Generic Name</th>
                                        <td> <a href="{{ route('generic.show',$generic->id)}}"> {{ $generic->generic_name}}</a> </td>
                                    </tr>

                                    <tr>
                                        <th>Company</th>
                                        <td> {{ $medicine->company }} </td>
                                    </tr>

                                    <tr>
                                        <th>Price</th>
                                        <td> ৳ {{ $medicine->price }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{$medicine->img_path}}" class="card-img-top" alt="img">
                        </div>
                    </div>
                </div>
                @if(auth()->user()->role == 1 or auth()->user()->role == 4)
                <div class="row">
                    <a href="{{ route('medicine.edit', $medicine->id )}}" class="btn btn-info m-3">Edit Medicine</a>
                    <form class="m-3" action="{{ route('medicine.destroy', $medicine->id )}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Remove Medicine</button>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection


<!-- 
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
 -->