@extends('layouts.admin')

@section('title', 'Message')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">

            <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif

                <div class="form-row">

                    <div class="col">
                        <a class="btn btn-info" href="{{ route('medAlert.show', session()->get('id')) }}">Medicine Alert
                            Profile</a>
                    </div>

                    <div class="col">
                        <a class="btn btn-primary" href="{{ route('medAlert.index') }}">Medicine Alert List</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection