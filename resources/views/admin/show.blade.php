@extends('layouts.admin')

@section('title', 'Admin Profile Modifications')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Admin Profile</div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-body">
                            <table class="table" id="table">
                                <tbody>
                                    <tr class="bg-dark text-light">
                                        <th>#</th>
                                        <td>{{ $admin->id }}</td>
                                    </tr>

                                    <tr>
                                        <th>Username</th>
                                        <td>{{ $admin->username }}</td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $admin->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Role</th>
                                        <td>{{ $admin->role }}</td>
                                    </tr>

                                    <tr>
                                        <th>Join Date</th>
                                        <td> {{ $admin->created_at }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="card">
                            <img src="{{$admin->img_path}}" class="card-img-top" alt="img">
                        </div>
                    </div> -->
                </div>

                <div class="row">
                    <a href="{{ route('admin.edit', $admin->id )}}" class="btn btn-info m-3">Edit Profile</a>
                    <form class="m-3" action="{{ route('admin.destroy', $admin->id )}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection