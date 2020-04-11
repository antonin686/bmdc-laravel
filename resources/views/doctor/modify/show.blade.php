@extends('layouts.admin')

@section('title', 'Doctor Info')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Doctor Info</div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card card-body">
                            <div class="row">
                                <div class="ml-3 h5">Current Details</div>
                                <div class="mr-3 ml-auto">
                                    <button type="button" id="btn-toggle" class="btn btn-info">Show/Hide
                                        Details</button>
                                </div>
                            </div> <br>

                            <table class="table">
                                <tbody style="display:none" id="table-toggle">
                                    <tr class="bg-dark text-light">
                                        <th>#</th>
                                        <td>{{ $doctor->registration_id }}</td>

                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $doctor->full_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone</th>
                                        <td> {{ $doctor->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th>Email</th>
                                        <td> {{ $doctor->email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Speciality</th>
                                        <td>{{ $doctor->speciality }}</td>
                                    </tr>

                                    <tr>
                                        <th>Place Of Work</th>
                                        <td> {{ $doctor->work_place }}</td>
                                    </tr>

                                    <tr>
                                        <th>Degree</th>
                                        <td> {{ $doctor->basic_degree }}, {{ $doctor->advance_degree }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="card">
                            <img src="{{$doctor->img_path}}" class="card-img-top" alt="img">
                        </div>
                    </div> -->

                    <div class="col-md-12 mx-auto mx-0 mt-3">
                        <div class="card">


                            <div class="card-body">
                                <form method="POST" action="{{ route('doctor.update', $doctor->id)}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="modify" value="{{ $doctorModify->id }}">
                                    <div class="row">
                                        <div class="ml-3 h5">Requested Changes</div>
                                        <div class="mr-3 ml-auto">
                                            <button type="submit" class="btn btn-primary">Done</button>
                                        </div>
                                    </div> <br>

                                    <table class="table table-responsive-sm" id="table">
                                        <tbody>
                                            <tr class="bg-dark text-light">
                                                <th>Field</th>
                                                <td>Current</td>
                                                <td>Requested</td>
                                                <td>Action</td>
                                            </tr>
                                            @if($doctorModify->full_name)
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $doctor->full_name }}</td>
                                                <td>{{ $doctorModify->full_name }}</td>
                                                <td>
                                                    <div class="custom-control custom-switch switch-info">
                                                        <input type="checkbox" name="full_name"
                                                            value="{{ $doctorModify->full_name }}"
                                                            class="custom-control-input" id="switchName">
                                                        <label class="custom-control-label" for="switchName"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif

                                            @if($doctorModify->speciality)
                                            <tr>
                                                <th>Speciality</th>
                                                <td>{{ $doctor->speciality }}</td>
                                                <td>{{ $doctorModify->speciality }}</td>
                                                <td>
                                                    <div class="custom-control custom-switch switch-info">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="speciality" value="{{ $doctorModify->speciality }}"
                                                            id="switchSpeciality">
                                                        <label class="custom-control-label"
                                                            for="switchSpeciality"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif

                                            @if($doctorModify->basic_degree)
                                            <tr>
                                                <th>Basic Degree</th>
                                                <td>{{ $doctor->basic_degree }}</td>
                                                <td>{{ $doctorModify->basic_degree }}</td>
                                                <td>
                                                    <div class="custom-control custom-switch switch-info">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="basic_degree"
                                                            value="{{ $doctorModify->basic_degree }}" id="basic_degree">
                                                        <label class="custom-control-label" for="basic_degree"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif

                                            @if($doctorModify->advance_degree)
                                            <tr>
                                                <th>Advance Degree</th>
                                                <td>{{ $doctor->advance_degree }}</td>
                                                <td>{{ $doctorModify->advance_degree }}</td>
                                                <td>
                                                    <div class="custom-control custom-switch switch-info">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="advance_degree"
                                                            value="{{ $doctorModify->advance_degree }}"
                                                            id="advance_degree">
                                                        <label class="custom-control-label"
                                                            for="advance_degree"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif

                                            @if($doctorModify->work_place)
                                            <tr>
                                                <th>Place Of Work</th>
                                                <td>{{ $doctor->work_place }}</td>
                                                <td>{{ $doctorModify->work_place }}</td>
                                                <td>
                                                    <div class="custom-control custom-switch switch-info">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="work_place" value="{{ $doctorModify->work_place }}"
                                                            id="work_place">
                                                        <label class="custom-control-label" for="work_place"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $("#btn-toggle").click(function() {
        $("#table-toggle").fadeToggle("slow");
    });

});
</script>
@endsection