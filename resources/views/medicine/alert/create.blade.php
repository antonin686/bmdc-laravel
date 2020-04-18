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
                    <form method="POST" action="{{ route('medAlert.store')}}">
                        @csrf

                        <label for="med_id">Medicine ID</label>
                        <div class="form-row">
                            <div class="col">

                                <input type="text" class="form-control" name="med_id" value="{{ old('med_id') }}"
                                    >
                            </div>

                            <div class="col">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Select Medicine
                                </button>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="alert_gender">
                                <option>Both</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <label for="alert_range">Age Range</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="number" class="form-control" name="age_range_low" placeholder="Low"
                                    value="{{ old('age_range_low') }}">
                            </div>

                            <div class="col">
                                <input type="number" class="form-control" name="age_range_high" placeholder="High"
                                    value="{{ old('age_range_High') }}">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="alert_range">Alert Range</label>
                                <input type="number" class="form-control" name="alert_range"
                                    value="{{ old('alert_range') }}">
                            </div>

                            <div class="col">
                                <label for="med_unit">Medicine Unit</label>
                                <input type="text" class="form-control" name="med_unit" value="{{ old('med_unit') }}">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="max_duration">Max Duration</label>
                                <input type="number" class="form-control" name="max_duration"
                                    value="{{ old('max_duration') }}">
                            </div>

                            <div class="col">
                                <label for="duration_unit">Duration Unit</label>
                                <input type="text" class="form-control" name="duration_unit"
                                    value="{{ old('duration_unit') }}">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="alert_for">Alert For</label>
                            <input type="text" class="form-control" name="alert_for" value="{{ old('alert_for') }}">
                        </div>

                        <button type="submit" class="btn btn-success">Add Medicine Alert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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