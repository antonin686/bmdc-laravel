@extends('layouts.admin')

@section('title', 'All Doctor')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">

            <div class="card-body">
                <a class="btn btn-primary m-3" href="{{ route('doctor.create')}}">Add New Doctor</a>
                <div class="card card-body">
                    <table class="table table-hover" id="table">
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
                                <td>{{ $doc->first_name }} {{ $doc->last_name }}</td>
                                <td>{{ $doc->speciality }}</td>
                                <td>{{ $doc->degree }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('doctor.show', $doc->id)}}"> <i class="fas fa-info"></i> </a>
                                    <a class="btn btn-primary" href="{{ route('doctor.edit', $doc->id)}}"> <i class="fas fa-pen-alt"></i> </a>

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
// $(document).ready(() => {
//     $('#table').on('click', 'tr', (event) => {
//         var id = $(event.currentTarget).attr("id");
//         if (id != null) {
//             window.location.href = `/admin/doctor/${id}`;
//         }
//     });
// });
</script>
@endsection