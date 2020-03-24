@extends('layouts.admin')

@section('title', 'All Prescription')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">
                Prrescription List
            </div>
            <div class="card-body">

                <div class="card card-body">
                    <table class="table table-hover table-responsive-sm table-striped" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Citizen ID</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Disease</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prescs as $presc)
                            <tr id="{{ $presc->id }}">
                                <td>{{ $presc->id }}</td>
                                <td>{{ $presc->citizen_id }}</td>
                                <td>{{ $presc->full_name }}</td>
                                <td>{{ $presc->disease }}</td>
                                <td>{{ $presc->created_at }}</td>
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
            window.location.href = `/admin/prescription/${id}`;
        }
    });
});
</script>
@endsection