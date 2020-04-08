@extends('layouts.admin')

@section('title', 'All Doctor')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Doctor List</div>
            <div class="card-body">

                <a class="btn btn-primary m-3" href="{{ route('doctor.create')}}">Add New Doctor</a>
                <div class="card card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <table class="table table-hover table-responsive-sm" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Speciality</th>
                                <th scope="col">Degree</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($docs as $doc)
                            <tr id="{{ $doc->id }}">
                                <td>{{ $doc->id }}</td>
                                <td>{{ $doc->full_name }}</td>
                                <td>{{ $doc->speciality }}</td>
                                <td>{{ $doc->basic_degree }}, {{ $doc->advance_degree }}</td>
                                <td>
                                    <div class="row">
                                        <a title="Details" class="btn btn-info mt-1 mr-1"
                                            href="{{ route('doctor.show', $doc->id)}}"> <i class="fas fa-info"></i> </a>
                                        <a title="Edit" class="btn btn-primary mt-1 mr-1"
                                            href="{{ route('doctor.edit', $doc->id)}}"> <i class="fas fa-pen-alt"></i>
                                        </a>
                                        <form title="Delete" action="{{ route('doctor.destroy', $doc->id)}}"
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