@extends('layouts.admin')

@section('title', 'All Doctor Modifies')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Doctor Profile Update Request List</div>
            <div class="card-body">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr id="{{ $doctor->id }}">
                                <td>{{ $doctor->id }}</td>
                                <td>{{ $doctor->full_name }}</td>
                                <td>{{ $doctor->speciality }}</td>
                                <td>{{ $doctor->basic_degree }}, {{ $doctor->advance_degree }}</td>
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
    $('#table').on('click', 'tr', (event) => {
        var id = $(event.currentTarget).attr("id");
        if (id != null) {
            window.location.href = `/admin/doctorModify/${id}`;
        }
    });
});
</script>
@endsection