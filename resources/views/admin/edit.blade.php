@extends('layouts.admin')

@section('title', 'Edit Admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto mt-3">
            <div class="card">
                <div class="card-header card-header-bg">Edit Admin Profile</div>
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
                            <form class="px-3" method="POST" action=" {{ route('admin.update', $admin->id)}} ">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" placeholder="Full Name"
                                        value="{{ $admin->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="3">General Admin</option>
                                        <option value="4">Medicine Admin</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Apply Changes</button>

                            </form>
                        </div>
                        <!-- <div class="col md-4 mt-3">
                            <div class="card">
                                <img src="{{'dasd'}}" class="card-img-top" alt="img">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection