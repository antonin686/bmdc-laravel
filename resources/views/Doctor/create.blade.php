@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header">Add Doctor</div>
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nid">NID</label>
                            <input type="text" class="form-control" name="nid"">
                        </div>

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name"">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" >
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" >
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree</label>
                            <input type="text" class="form-control" name="degree" >
                        </div>

                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input type="text" class="form-control" name="speciality">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <button type="submit" class="btn btn-success">Add Doctor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection