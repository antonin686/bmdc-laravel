@extends('layouts.admin')

@section('title', 'Home')

@section('content')

<div class="row mt-3 pt-3">

    @if(auth()->user()->role == 1 or auth()->user()->role == 3)
    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-primary-light">
                <a href=" {{ route('doctor.index') }} ">
                    <div class="h1">
                        <i class="fas fa-user-md text-light"></i>
                    </div>
                    <div class="row">
                        <div class="mr-auto ml-2 display-5 text-light">
                            <strong>Doctors</strong>
                            <div class="text-white-50">Total</div>
                        </div>
                        <div class="ml-auto text-light mr-2 h5">
                            <strong> <span id="card-doctor" class="badge badge-primary badge-pill">0</span></strong>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-danger-light">
                <a href="{{ route('application.doctorApplicationIndex') }}">
                    <div class="h1">
                        <i class="fas fa-portrait text-light"></i>
                    </div>
                    <div class="row">
                        <div class="mr-auto ml-2 display-5 text-light">
                            <strong>Doctor Applications</strong>
                            <div class="text-white-50">New</div>
                        </div>
                        <div class="ml-auto text-light mt-2 mr-2 h5">
                            <strong> <span id="card-doctor-application"
                                    class="badge badge-danger text-light badge-pill">0</span>
                            </strong>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-success-light">
                <a href="{{ route('doctorModify.index') }}">
                    <div class="h1">
                        <i class="fas fa-portrait text-light"></i>
                    </div>
                    <div class="row">
                        <div class="mr-auto ml-2 display-5 text-light">
                            <strong>Doctor Profile Changes</strong>
                            <div class="text-white-50">New</div>
                        </div>
                        <div class="ml-auto text-light mt-2 mr-2 h5">
                            <strong> <span id="card-doctor-modification"
                                    class="badge badge-success text-light badge-pill">0</span>
                            </strong>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endif

    @if(auth()->user()->role == 1 or auth()->user()->role == 4)
    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-info-light">
                <a href=" {{ route('medicine.index') }}">
                    <div class="h1">
                        <i class="fas fa-pills text-light"></i>
                    </div>
                    <div class="row">
                        <div class="mr-auto ml-2 display-5 text-light">
                            <strong>Medicines</strong>
                            <div class="text-white-50">Total</div>
                        </div>
                        <div class="ml-auto text-light mr-2 h5">
                            <strong> <span id="card-medicine" class="badge badge-info badge-pill">0</span></strong>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-warning-light">
                <a href=" {{ route('generic.index') }} ">
                    <div class="h1">
                        <i class="fas fa-flask text-light"></i>
                    </div>
                    <div class="row">
                        <div class="mr-auto ml-2 display-5 text-light">
                            <strong>Generics</strong>
                            <div class="text-white-50">Total</div>
                        </div>
                        <div class="ml-auto text-light mr-2 h5">
                            <strong> <span id="card-generic"
                                    class="badge badge-warning text-light badge-pill">0</span></strong>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-purple-light">
                <a href="{{ route('application.medicineApplicationIndex') }}">
                    <div class="h1">
                        <i class="fas fa-file-medical text-light"></i>
                    </div>
                    <div class="row">
                        <div class="mr-auto ml-2 display-5 text-light">
                            <strong>Medicine Applications</strong>
                            <div class="text-white-50">New</div>
                        </div>
                        <div class="ml-auto text-light mt-2 mr-2 h5">
                            <strong> <span id="card-medicine-application"
                                    class="badge bg-purple text-light badge-pill">0</span>
                            </strong>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endif

    <div class="col-md-8 mt-4">
        <div class="ct-chart ct-perfect-fourth"></div>
    </div>


</div>

<script>
$(document).ready(function() {
    adminHomeCounts();

    function adminHomeCounts() {

        $.ajax({
            url: "{{ route('ajax.adminHomeCounts')}}",
            method: "GET",
            dataType: "json",
            success: function(result) {
                $('#card-doctor').html(result[0]);
                $('#card-doctor-application').html(result[1]);
                $('#card-doctor-modification').html(result[2]);
                $('#card-medicine').html(result[3]);
                $('#card-generic').html(result[4]);
                $('#card-medicine-application').html(result[5]);
            }
        });
    }

    new Chartist.Bar('.ct-chart', {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        series: [
            [5, 4, 3, 7, 5, 10, 3]
        ]
    }, {
        seriesBarDistance: 10,
        
        horizontalBars: true,
        axisY: {
            offset: 70
        }
    });



});
</script>
@endsection