@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    Doctor Application Form
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nid">NID</label>
                            <input type="text" class="form-control" name="nid">
                        </div>

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="email">Degree</label>
                            <input type="text" class="form-control" name="degree">
                        </div>

                        <div class="form-group">
                            <label for="institute">Institute</label>
                            <input type="text" class="form-control" name="institute">
                        </div>

                        <div class="form-group">
                            <label for="speciality">Speciality <small>(optional)</small> </label>
                            <input type="text" class="form-control" name="speciality">
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