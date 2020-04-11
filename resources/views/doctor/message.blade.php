@extends('layouts.admin')

@section('title', 'Message')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">Message</div>
            <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>

                <div class="row m-0 p-0">
                    <div class="col-md-3  mt-2">
                        <a class="btn btn-info" href="{{ route('doctor.show', session()->get('id')) }}">Doctor
                            Profile</a>
                    </div>

                    <div class="col-md-3 mt-2">
                        <a class="btn btn-primary" href="{{ route('doctor.index') }}">Doctor List</a>
                    </div>
                </div>
                @endif

                @if(session()->has('err'))
                <div class="alert alert-danger">
                    {{ session()->get('err') }}
                </div>

                <div class="row m-0 p-0">
                    <div class="col-md-6 mt-2">
                        <a class="btn btn-info" href="{{ route('doctorModify.index') }}">Doctor
                            Modification Requests</a>
                    </div>

                    <div class="col-md-3 mt-2">
                        <a class="btn btn-primary" href="{{ route('doctor.index') }}">Doctor List</a>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection