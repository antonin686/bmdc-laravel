@extends('layouts.admin')

@section('title', 'Add Medicine')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header card-header-bg">Add New Medicine</div>
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
                    <form method="POST" action="{{ route('medicine.store')}}" enctype="multipart/form-data">
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

                        <div class="custom-file my-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                        <button type="submit" class="btn btn-success">Add Medicine</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    bsCustomFileInput.init();

});
</script>

@endsection