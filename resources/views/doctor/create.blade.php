@extends('layouts.admin')

@section('title', 'Add Doctor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header card-header-bg">Add Doctor</div>
                <div class="card-body">
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
                    <form class="px-3" method="POST" action="{{ route('doctor.store')}}" enctype="multipart/form-data">
                        @csrf

                        <label for="registration_id">Registration Number</label><br>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="registration_id" id="registration_id"
                                value="{{ old('registration_id') }}" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"
                                    id="generate_id">Generate</button>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nid">NID</label>
                                <input type="text" class="form-control" name="nid" value="{{ old('nid') }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                    required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="basic_degree">Basic Degree</label>
                                <input type="text" class="form-control" name="basic_degree"
                                    value="{{ old('basic_degree') }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="advance_degree">Advance Degree</label>
                                <input type="text" class="form-control" name="advance_degree"
                                    value="{{ old('advance_degree') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="speciality">Speciality</label>
                                <input type="text" class="form-control" name="speciality"
                                    value="{{ old('speciality') }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="work_place">Work Place</label>
                                <input type="text" class="form-control" name="work_place"
                                    value="{{ old('work_place') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="custom-file my-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                        <button type="submit" class="btn btn-success">Add Doctor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    bsCustomFileInput.init();

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