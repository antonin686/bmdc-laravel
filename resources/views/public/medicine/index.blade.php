@extends('layouts.public')

@section('title', 'All Medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-body">

                <table class="table table-hover" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Generic</th>
                            <th scope="col">Dosage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meds as $med)
                        <tr id="{{ $med->id }}">
                            <td>{{ $med->id }}</td>
                            <td>{{ $med->brand_name }} <small>{{ $med->strength }}</small> </td>
                            <td>{{ $med->generic_name }}</td>
                            <td>{{ $med->dosage_form }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

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
            window.location.href = `/publicMedicine/${id}`;
        }
    });
});
</script>
@endsection