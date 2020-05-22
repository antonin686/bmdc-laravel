@extends('layouts.admin')

@section('title', 'Add Admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header card-header-bg">Add Admin</div>
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
                    <form class="px-3" method="POST" action="{{ route('admin.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" name="full_name" placeholder="Full Name"
                                value="{{ old('full_name')}}">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password" value="{{ old('password')}}">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="3">General Admin</option>
                                <option value="4">Medicine Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Add Admin</button>
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
        generateAdminID();
    });

    function generateAdminID(id) {

        $.ajax({
            url: '/ajax/generateAdminID',
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