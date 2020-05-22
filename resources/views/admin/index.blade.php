@extends('layouts.admin')

@section('title', 'All Admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Admin List</div>
            <div class="card-body">

                <a class="btn btn-primary m-3" href="{{ route('admin.create')}}">Add New Admin</a>
                <div class="card card-body">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <table class="table table-hover table-responsive-sm" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                            <tr id="{{ $admin->id }}">
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->role }}</td>
                                <td>
                                    <div class="row">
                                        <a title="Details" class="btn btn-info mt-1 mr-1"
                                            href="{{ route('admin.show', $admin->id)}}"> <i class="fas fa-info"></i> </a>
                                        <a title="Edit" class="btn btn-primary mt-1 mr-1"
                                            href="{{ route('admin.edit', $admin->id)}}"> <i class="fas fa-pen-alt"></i>
                                        </a>
                                        <form title="Delete" action="{{ route('admin.destroy', $admin->id)}}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mt-1" type="submit"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
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