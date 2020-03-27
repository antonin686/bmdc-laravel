@extends('layouts.medicine')

@section('title', 'Generic Based Brand List')

@section('subcontent')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">

            <div class="card-body">
                <div class="h2 m-3 p-3">
                    {{ $meds->generic_name }} <small class="text-secondary">Available Brand Names</small>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive-sm table-hover" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Dosage</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meds->list as $med)
                                <tr id="{{ $med->id }}">
                                    <td>{{ $med->id }}</td>
                                    <td>{{ $med->brand_name }} <small>{{ $med->strength }}</small> </td>
                                    <td>{{ $med->dosage_form }}</td>
                                    <td>{{ $med->company }}</td>
                                    <td>{{ $med->price }} tk</td>
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