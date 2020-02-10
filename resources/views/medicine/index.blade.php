@extends('layouts.admin')

@section('title', 'All Medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">

            <div class="card-body">
                <a class="btn btn-primary m-3" href="{{ route('medicine.create')}}">Add New Medicine</a>
                <div class="card card-body">
                    <table class="table table-hover" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Geneic</th>
                                <th scope="col">Dosage</th>
                                <th scope="col">Strength</th>
                                <th scope="col">Geneic</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meds as $med)
                            <tr id="{{ $med->id }}">
                                <td>{{ $med->id }}</td>
                                <td>{{ $med->ge }} {{ $med->last_name }}</td>
                                <td>{{ $med->speciality }}</td>
                                <td>{{ $med->degree }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('medtor.show', $med->id)}}"> <i class="fas fa-info"></i> </a>
                                    <a class="btn btn-primary" href="{{ route('medtor.edit', $med->id)}}"> <i class="fas fa-pen-alt"></i> </a>

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
// $(medument).ready(() => {
//     $('#table').on('click', 'tr', (event) => {
//         var id = $(event.currentTarget).attr("id");
//         if (id != null) {
//             window.location.href = `/admin/medtor/${id}`;
//         }
//     });
// });
</script>
@endsection