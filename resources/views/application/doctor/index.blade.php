@extends('layouts.admin')

@section('title', 'Authorize - Doctor')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Doctor Application List</div>
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Speciality</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apps as $app)
                                <tr id="{{ $app->id }}">
                                    <td>{{ $app->id }}</td>
                                    <td>{{ $app->full_name }}</td>
                                    <td>{{ $app->speciality }}</td>
                                    <td>{{ $app->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(() => {
    $('#table').DataTable();
    $('#table').on('click', 'tr', (event) => {
        var id = $(event.currentTarget).attr("id");
        if (id != null) {
            window.location.href = `/admin/authorize/doctor/${id}`;
        }
    });
});
</script>
@endsection