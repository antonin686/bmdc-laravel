@extends('layouts.admin')

@section('title', 'Authorize - Medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Medicine Application List</div>
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-striped" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Generic</th>
                                    <th scope="col">Dosage</th>
                                    <th scope="col">Appicant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apps as $app)
                                <tr id="{{ $app->id }}">
                                    <td>{{ $app->id }}</td>
                                    <td>{{ $app->brand_name }} <small>{{ $app->strength }}</small> </td>
                                    <td>{{ $app->generic_name }}</td>
                                    <td>{{ $app->dosage_form }}</td>
                                    <td>{{ $app->applicant_name }}</td>
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
            window.location.href = `/admin/authorize/medicine/${id}`;
        }
    });
});
</script>
@endsection