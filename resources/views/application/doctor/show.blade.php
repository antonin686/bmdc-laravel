@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nid">NID</label>
                            <input type="text" class="form-control" name="nid" value="{{ $app->nid }}">
                        </div>

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ $app->first_name }}">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $app->last_name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $app->email }}">
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree</label>
                            <input type="text" class="form-control" name="degree" value="{{ $app->degree }}">
                        </div>

                        <div class="form-group">
                            <label for="institute">institute</label>
                            <input type="text" class="form-control" name="institute" value="{{ $app->institute }}">
                        </div>

                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input type="text" class="form-control" name="speciality" value="{{ $app->speciality }}">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <input type="hidden" name="img_path" value="{{$app->img_path}}">

                        <button type="submit" class="btn btn-primary">Approve</button>
                        <button type="button" class="btn btn-danger">Reject</button>
                    </form>

                </div>
                <div class="col-md-4 mx-auto m-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $app->img_path}}" class="card-img-top" alt="img">
                        <div class="card-body">
                            <h5 class="card-title">Image</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection