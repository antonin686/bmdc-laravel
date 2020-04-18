@extends('layouts.admin')

@section('title', 'Edit Medicine')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header card-header-bg">Edit Medicine Profile</div>
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
                    <form method="POST" action=" {{ route('medAlert.update', $med_alert->id)}} ">
                        @csrf
                        @method('PATCH')

                        <label for="med_id">Medicine ID</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="med_id" value="{{ $med_alert->med_id }}"
                                    disabled>
                            </div>

                            <div class="col">

                            </div>
                        </div>


                        <div class="form-group mt-3">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="alert_gender">
                                @if($med_alert->alert_gender == 'both')
                                <option selected ="selected">Both</option>
                                @else
                                <option>Both</option>
                                @endif
                                @if($med_alert->alert_gender == 'Male')
                                <option selected ="selected">Male</option>
                                @else
                                <option>Male</option>
                                @endif
                                @if($med_alert->alert_gender == 'Female')
                                <option selected ="selected">Female</option>
                                @else
                                <option>Female</option>
                                @endif
                            </select>
                        </div>

                        <label for="alert_range">Age Range</label>
                        <div class="form-row">
                            <div class="col">
                                <input type="number" class="form-control" name="age_range_low" placeholder="Low"
                                    value="{{ $med_alert->age_range_low }}">
                            </div>

                            <div class="col">
                                <input type="number" class="form-control" name="age_range_high" placeholder="High"
                                    value="{{ $med_alert->age_range_high }}">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="alert_range">Alert Range</label>
                                <input type="number" class="form-control" name="alert_range"
                                    value="{{ $med_alert->alert_range }}">
                            </div>

                            <div class="col">
                                <label for="med_unit">Medicine Unit</label>
                                <input type="text" class="form-control" name="med_unit" value="{{ $med_alert->med_unit }}">
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="max_duration">Max Duration</label>
                                <input type="number" class="form-control" name="max_duration"
                                    value="{{ $med_alert->max_duration }}">
                            </div>

                            <div class="col">
                                <label for="duration_unit">Duration Unit</label>
                                <input type="text" class="form-control" name="duration_unit"
                                    value="{{ $med_alert->duration_unit }}">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="alert_for">Alert For</label>
                            <input type="text" class="form-control" name="alert_for" value="{{ $med_alert->alert_for }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Apply Changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection