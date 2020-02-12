@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header">Add New Medicine</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('medicine.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name">Brand name</label>
                            <input type="text" class="form-control" name="brand_name"">
                        </div>

                        <div class="form-group">
                            <label for="dosage_form">Dosage Form</label>
                            <input type="text" class="form-control" name="dosage_form"">
                        </div>

                        <div class="form-group">
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

                        <button type="submit" class="btn btn-success">Add Medicine</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection