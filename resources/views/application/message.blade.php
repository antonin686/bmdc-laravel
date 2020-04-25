@extends('layouts.app')

@section('title', 'All Prescription')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">Message</div>
            <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif

                @if($mess ?? '' != null)
                <div class="alert alert-success">
                    {{ $mess ?? '' }}
                </div>
                @endif

                <div>
                    <a href="/">Go to Home Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
