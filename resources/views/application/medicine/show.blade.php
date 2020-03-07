@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header">Medicine Application Profile</div>
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
            <form method="POST" action=" {{ route('application.medicine.medstore', $medicine->id)}} ">
                @csrf
                <div class="form-group">
                    <label for="brand_name">Brand name</label>
                    <input type="text" class="form-control" name="brand_name" value="{{$medicine->brand_name}}">
                </div>

                <div class="form-group">
                    <label for="dosage_form">Dosage Form</label>
                    <input type="text" class="form-control" name="dosage_form" value="{{$medicine->dosage_form}}">
                </div>

                <div class="form-group">
                    <label for="generic">Generic</label>
                    <select class="form-control" id="generic" name="generic">

                        @foreach($generics as $generic)
                        @if($medicine->generic_id == $generic->id)
                        <option value="{{$generic->id}}" selected="selected">{{$generic->generic_name}}</option>
                        @else
                        <option value="{{$generic->id}}">{{$generic->generic_name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="strength">Strength</label>
                    <input type="text" class="form-control" name="strength" value="{{$medicine->strength}}">
                </div>

                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" name="company" value="{{$medicine->company}}">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$medicine->price}}">
                </div>

                <div class="form-group">
                    <label for="applicant_name">Applicant Name</label>
                    <input type="text" class="form-control" name="applicant_name"
                        value="{{ $medicine->applicant_name }}">
                </div>

                <div class="form-group">
                    <label for="applicant_email">Applicant Email</label>
                    <input type="email" class="form-control" name="applicant_email"
                        value="{{ $medicine->applicant_email }}">
                </div>

                <div class="form-group">
                    <label for="applicant_phone">Applicant Phone</label>
                    <input type="text" class="form-control" name="applicant_phone"
                        value="{{ $medicine->applicant_phone }}">
                </div>


                <button type="submit" class="btn btn-primary">Approve Medicine</button>

            </form>
        </div>
    </div>
</div>
@endsection