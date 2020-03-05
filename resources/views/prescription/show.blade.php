@extends('layouts.admin')

@section('title', 'All medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">Prescription</div>
            <div class="card-body">
                <div class="col">
                    <div class="col-md-12">
                        <div title="Hospital Name" class="h1 mx-auto"><i class="fas fa-clinic-medical text-success"></i>
                            {{$prescription->hospital_name}}
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="h5"> Doctor Info</div>
                        <hr>
                        <div class="row">
                            <div title="Name" class="col-md-6">
                                <span class="mr-2 text-info">
                                    <i class="fas fa-user-md"></i>
                                </span>
                                [ <a href="{{ route('doctor.show', $doctor->id)}}">
                                    {{ $doctor->first_name }}
                                    {{ $doctor->last_name }}
                                </a> ]
                            </div>
                            <div title="Speciality" class="col-md-6">
                                <span class="mr-2 text-info">
                                    <i class="fas fa-certificate"></i>
                                </span> [{{ $doctor->speciality}}]
                            </div>
                        </div>

                        <div class="row">
                            <div title="Degree" class="col-md-12">
                                <span class="text-info mr-1">
                                    <i class="fas fa-graduation-cap"></i>
                                </span>
                                [{{ $doctor->degree }} from {{ $doctor->institute }}]
                            </div>
                        </div>

                        <div class="row">
                            <div title="email" class="col-md-6">
                                <span class="mr-2 text-info">
                                    <i class="fas fa-at"></i>
                                </span> [{{ $doctor->email }}]
                            </div>

                            <div title="phone" class="col-md-6">
                                <span class="mr-2 text-info">
                                    <i class="fas fa-phone-alt"></i>
                                </span> [{{ $doctor->phone }}]
                            </div>
                        </div>

                        <hr>
                        <div class="h5">Patient Info</div>
                        <hr>

                        <div class="row">
                            <div class="col-md-3"> Mr./Ms./Mrs. </div>

                            <div class="col-md-3">
                                [{{ $citizen->first_name }} {{ $citizen->last_name }}]
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"> Age </div>

                            <div class="col-md-3">
                                [{{ $citizen->age }}]
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"> Address </div>

                            <div class="col-md-9">
                                [{{ $citizen->current_address }}]
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"> Prescription ID </div>

                            <div class="col-md-9">
                                [{{ $prescription->id }}]
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"> Date </div>

                            <div class="col-md-9">
                                [{{ $prescription->date }}]
                            </div>
                        </div>

                        <hr>

                        <p>
                            {{ $prescription->mainbody }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection