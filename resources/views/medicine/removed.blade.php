@extends('layouts.admin')

@section('title', 'All Medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">

            <div class="card-body">
                <div class="row mx-auto">
                    <a class="btn btn-primary m-3" href="{{ route('medicine.index')}}">Go back to Medicine List</a>
                </div>
                <div class="card card-body">
                    <table class="table table-striped table-hover" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Generic</th>
                                <th scope="col">Dosage</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meds as $med)
                            <tr id="{{ $med->id }}">
                                <td>{{ $med->id }}</td>
                                <td>{{ $med->brand_name }} <small>{{ $med->strength }}</small> </td>
                                <td>{{ $med->generic_name }}</td>
                                <td>{{ $med->dosage_form }}</td>
                                <td>{{ $med->status }}</td>
                                <td>
                                    <a class="btn btn-info mr-1" href="{{ route('medicine.removed.undo', $med->id)}}">
                                        <i class="fas fa-undo"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
@endsection