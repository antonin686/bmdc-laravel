@extends('layouts.admin')

@section('title', 'All Medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Medicine List</div>
            <div class="card-body">
                <div class="row mx-auto">
                    <a class="btn btn-primary m-3" href="{{ route('medicine.create')}}">Add New Medicine</a>
                    <a class="btn btn-danger m-3" href="{{ route('medicine.removed')}}">Show Removed Medicines</a>
                </div>
                <div class="card card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <table class="table table-hover table-striped table-responsive-sm" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Generic</th>
                                <th scope="col">Dosage</th>
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
                                <td class="text-center">
                                    <div class="row">
                                        <a title="Details" class="btn btn-info mr-1 mt-1"
                                            href="{{ route('medicine.show', $med->id)}}"> <i class="fas fa-info"></i>
                                        </a>
                                        <a title="Edit" class="btn btn-primary mr-1 mt-1"
                                            href="{{ route('medicine.edit', $med->id)}}"> <i class="fas fa-pen-alt"></i>
                                        </a>
                                        <form title="Delete" action="{{ route('medicine.destroy', $med->id)}}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mt-1" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
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