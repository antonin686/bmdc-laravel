@extends('layouts.admin')

@section('title', 'Doctor Application Authorization')

@section('content')
<div class="container mt-3">
    <div class="card">
    <div class="card-header card-header-bg">Doctor Authorization Application</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    @if (count($errors) > 0)
                    <p class="alert alert-danger mb-3">
                        @foreach ($errors->all() as $error)
                        {{$error}} <br>
                        @endforeach
                    </p>
                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nid">NID</label>
                            <input type="text" class="form-control" name="nid" value="{{ $app->nid }}">
                        </div>

                        <label for="registration_id">Registration Number</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="registration_id" id="registration_id">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"
                                    id="generate_id">Generate</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" name="full_name" value="{{ $app->full_name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $app->email }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $app->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="basic_degree">Basic Degree</label>
                            <input type="text" class="form-control" name="basic_degree"
                                value="{{ $app->basic_degree }}">
                        </div>

                        <div class="form-group">
                            <label for="advance_degree">Advance Degree</label>
                            <input type="text" class="form-control" name="advance_degree"
                                value="{{ $app->advance_degree }}">
                        </div>

                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input type="text" class="form-control" name="speciality" value="{{ $app->speciality }}">
                        </div>

                        <div class="form-group">
                            <label for="work_place">Work Place</label>
                            <input type="text" class="form-control" name="work_place" value="{{ $app->work_place }}">
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
                    <div class="card">
                        <img src="{{ $app->img_path}}" class="card-img-top" alt="img">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $("#generate_id").click(function() {
        generateDoctorID();
    });

    function generateDoctorID(id) {

        $.ajax({
            url: '/ajax/generateDoctorID',
            method: "GET",
            dataType: "json",
            success: function(result) {
                //console.log(result);
                $("#registration_id").val(result);
            }
        });
    }
});
</script>
@endsection