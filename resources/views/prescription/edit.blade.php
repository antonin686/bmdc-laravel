@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header">Edit Doctor Profile</div>
                <div class="card-body">
                    <form method="POST" action=" {{ route('medicine.update', $medicine->id)}} ">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="brand_name">Brand name</label>
                            <input type="text" class="form-control" name="brand_name" value="{{$medicine->brand_name}}">
                        </div>

                        <div class="form-group">
                            <label for="dosage_form">Dosage Form</label>
                            <input type="text" class="form-control" name="dosage_form"
                                value="{{$medicine->dosage_form}}">
                        </div>

                        <div class="form-group">
                            <label for="generic">Generic</label>
                            <select class="form-control" id="generic" name="generic">

                                @foreach($generics as $generic)
                                @if($medicine->generic_id == $generic->id)
                                <option value="{{$generic->id}}" selected="selected">{{$generic->generic_name}}</option>
                                @else
                                <option value="{{$generic->id}}" selected="selected">{{$generic->generic_name}}</option>
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

                        <button type="submit" class="btn btn-primary">Apply Changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection