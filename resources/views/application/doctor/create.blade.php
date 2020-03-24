@extends('layouts.public')

@section('title', 'Doctor Application Form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    Doctor Application Form
                </div>
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

                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                        </div>
                        <div class="form-group">
                            <label for="nid">NID</label>
                            <input type="text" class="form-control" name="nid" value="{{ old('nid') }}">
                        </div>

                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label for="basic_degree">Basic Degree</label>
                            <input type="text" class="form-control" name="basic_degree"
                                value="{{ old('basic_degree') }}">
                        </div>

                        <div class="form-group">
                            <label for="advance_degree">Advance Degree</label>
                            <input type="text" class="form-control" name="advance_degree"
                                value="{{ old('advance_degree') }}">
                        </div>

                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input type="text" class="form-control" name="speciality" value="{{ old('speciality') }}">
                        </div>

                        <div class="form-group">
                            <label for="work_place">Work Place</label>
                            <input type="text" class="form-control" name="work_place" value="{{ old('work_place') }}">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection