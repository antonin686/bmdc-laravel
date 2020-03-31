@extends('layouts.admin')

@section('title', 'All medicine')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Prescription</div>
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
                                    {{ $doctor->full_name }}
                                </a> ]
                            </div>
                            <div title="Speciality" class="col-md-6">
                                <span class="mr-2 text-info">
                                    <i class="fas fa-certificate"></i>
                                </span> [ {{ $doctor->speciality}} ]
                            </div>
                        </div>

                        <div class="row">
                            <div title="Degree" class="col-md-12">
                                <span class="text-info mr-1">
                                    <i class="fas fa-graduation-cap"></i>
                                </span>
                                [ {{ $doctor->basic_degree }}, {{ $doctor->advance_degree }} ]
                            </div>
                        </div>

                        <div class="row">
                            <div title="email" class="col-md-6">
                                <span class="mr-2 text-info">
                                    <i class="fas fa-at"></i>
                                </span> [ {{ $doctor->email }} ]
                            </div>

                            <div title="phone" class="col-md-6">
                                <span class="mr-2 text-info">
                                    <i class="fas fa-phone-alt"></i>
                                </span> [ {{ $doctor->phone }} ]
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
                        <div class="h5">Prescription</div>
                        <hr>

                        <div class="col ml-0 pl-0">
                            <div class="col-md-6 ml-0 pl-0">
                                <strong>Disease</strong>: {{$prescription->disease}}
                            </div>

                            <div class="col-md-6 ml-0 pl-0">
                                <strong>OE</strong>: {{$prescription->oe}}
                            </div>

                            <div class="col-md-6 ml-0 pl-0">
                                <strong>LX</strong>: {{$prescription->lx}}
                            </div>

                            <div class="col-md-6 ml-0 pl-0">
                                <strong>CC</strong>: {{$prescription->cc}}
                            </div>
                        </div>

                        <div class="col-md-8 ml-0 pl-0">

                            <hr>
                            <strong>Body:</strong>
                            <hr>
                            <p>
                                {!! nl2br($prescription->mainbody) !!}
                            </p>
                            @if($prescription->revisit)
                            <div class="text-center text-danger">Revisit in {{$prescription->revisit}} Days</div>
                            @else
                            <div class="text-center text-success">Best Wishes, Get Well Soon</div>    
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection