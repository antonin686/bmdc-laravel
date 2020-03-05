@extends('layouts.admin')

@section('title', 'All Prescription')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header">
                Prrescription List
            </div>
            <div class="card-body">

                <div class="card card-body">
                    <table class="table table-hover table-striped" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Citizen ID</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Disease</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prescs as $presc)
                            <tr id="{{ $presc->id }}">
                                <td>{{ $presc->id }}</td>
                                <td>{{ $presc->citizen_id }}</td>
                                <td>{{ $presc->first_name }} {{ $presc->last_name }}</td>
                                <td>{{ $presc->disease }}</td>
                                <td>{{ $presc->created_at }}</td>
                                <td>
                                    <div class="row">
                                        <a class="btn btn-info mr-1" href="{{ route('prescription.show', $presc->id)}}">
                                            <i class="fas fa-info"></i> </a>
                                        <!-- <a class="btn btn-primary mr-1"
                                            href="{{ route('prescription.edit', $presc->id)}}"> <i
                                                class="fas fa-pen-alt"></i> </a>
                                        <form action="{{ route('prescription.destroy', $presc->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                        </form> -->
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