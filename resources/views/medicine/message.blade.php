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

                <div class="row m-0 p-0">    
                    <div class="col-md-3  mt-2">
                        <a class="btn btn-info" href="{{ route('medicine.show', session()->get('id')) }}">Medicine Profile</a>
                    </div>

                    <div class="col-md-3 mt-2">
                        <a class="btn btn-primary" href="{{ route('medicine.index') }}">Medicine List</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection