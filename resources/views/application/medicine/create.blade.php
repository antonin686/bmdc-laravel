@extends('layouts.public')

@section('title', 'Create Medicine Application')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    Medicine Application Form
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
                    <form method="POST" action="{{ route('application.medicine.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="brand_name">Brand name</label>
                            <input type="text" class="form-control" name="brand_name">
                        </div>

                        <div class=" form-group">
                            <label for="dosage_form">Dosage Form</label>
                            <input type="text" class="form-control" name="dosage_form">
                        </div>

                        <div class=" form-group">
                            <label for="generic">Generic</label>
                            <select class="form-control" id="generic" name="generic">
                                @foreach($generics as $generic)
                                <option value="{{$generic->id}}">{{$generic->generic_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="strength">Strength</label>
                            <input type="text" class="form-control" name="strength">
                        </div>

                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" name="company">
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>

                        <div class="form-group">
                            <label for="applicant_name">Applicant Name</label>
                            <input type="text" class="form-control" name="applicant_name">
                        </div>

                        <div class="form-group">
                            <label for="applicant_email">Applicant Email</label>
                            <input type="email" class="form-control" name="applicant_email">
                        </div>

                        <div class="form-group">
                            <label for="applicant_phone">Applicant Phone</label>
                            <input type="text" class="form-control" name="applicant_phone">
                        </div>

                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection