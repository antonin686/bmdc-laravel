@extends('layouts.admin')

@section('title', 'Edit Doctor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto mt-3">
            <div class="card">
                <div class="card-header card-header-bg">Edit Doctor Profile</div>
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
                    <div class="row">

                        <div class="col-md-8">
                            <form class="px-3" method="POST" action=" {{ route('doctor.update', $doc->id)}} ">
                                @csrf
                                @method('PATCH')

                                <div class="form-group ">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" value="{{ $doc->username}}"
                                        readonly>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nid">NID</label>
                                        <input type="text" class="form-control" name="nid" value="{{ $doc->nid }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="registration_id">Registration Number</label>
                                        <input type="text" class="form-control" name="registration_id"
                                            value="{{ $doc->registration_id}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" name="full_name"
                                        value="{{ $doc->full_name }}">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $doc->email }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $doc->phone }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="basic_degree">Basic basic_degree</label>
                                        <input type="text" class="form-control" name="basic_degree"
                                            value="{{ $doc->basic_degree }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="advance_degree">Advance Degree</label>
                                        <input type="text" class="form-control" name="advance_degree"
                                            value="{{ $doc->advance_degree }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="speciality">Speciality</label>
                                    <input type="text" class="form-control" name="speciality"
                                        value="{{ $doc->speciality }}">
                                </div>

                                <div class="form-group">
                                    <label for="work_place">Work Place</label>
                                    <input type="text" class="form-control" name="work_place"
                                        value="{{ $doc->work_place }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Apply Changes</button>

                            </form>
                        </div>
                        <div class="col md-4 mt-3">
                            <div class="card">
                                <img src="{{$doc->img_path}}" class="card-img-top" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection