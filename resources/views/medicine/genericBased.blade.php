@extends('layouts.admin')

@section('title', 'All Medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">

            <div class="card-body">
                <div class="h2 m-3 p-3">
                {{ $meds->generic_name }} <small class="text-secondary">Available Brand Names</small>
                </div>
                <table class="table table-hover" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Strength</th>
                            <th scope="col">Dosage</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meds->list as $med)
                        <tr id="{{ $med->id }}">
                            <td>{{ $med->id }}</td>
                            <td>{{ $med->brand_name }}</td>
                            <td>{{ $med->strength }}</td>
                            <td>{{ $med->dosage_form }}</td>
                            <td>{{ $med->price }} tk</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection