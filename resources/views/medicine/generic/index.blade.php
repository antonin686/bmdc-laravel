@extends('layouts.admin')

@section('title', 'All Medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">

            <div class="card-body">
                <div class="row mx-auto">
                <a class="btn btn-primary m-3" href="{{ route('generic.create')}}">Add New Generic</a>
                </div>
                <div class="card card-body">
                    <table class="table table-striped table-hover" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Generic Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generics as $generic)
                            <tr id="{{ $generic->id }}">
                                <td>{{ $generic->id }}</td>
                                <td>{{ $generic->generic_name }}</td>
                                <td>
                                    <div class="row">
                                    <a class="btn btn-info mr-1" href="{{ route('generic.show', $generic->id)}}"> <i
                                            class="fas fa-info"></i> </a>
                                    <a class="btn btn-primary mr-1" href="{{ route('generic.edit', $generic->id)}}"> <i
                                            class="fas fa-pen-alt"></i> </a>
                                    <!-- <form action="{{ route('generic.destroy', $generic->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
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