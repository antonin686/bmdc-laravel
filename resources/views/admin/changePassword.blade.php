@extends('layouts.admin')

@section('title', 'Change Password')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header card-header-bg">Change Password</div>
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

                    @if(session()->has('redMessage'))
                    <div class="alert alert-danger">
                        {{ session()->get('redMessage') }}
                    </div>
                    @endif

                    <form class="px-3" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="password">Current Password</label>
                            <input type="password" class="form-control" name="currPass"  value="{{ old('currPass')}}">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" name="password" >
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" >
                        </div>
                        
                        <button type="submit" class="btn btn-success">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection