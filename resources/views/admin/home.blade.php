@extends('layouts.admin')

@section('title', 'Home')

@section('content')
<div class="row mt-3 pt-3">
    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-primary-light">
                <div class="h1">
                    <i class="fas fa-user-md text-light"></i>
                </div>
                <div class="row">
                    <div class="mr-auto ml-2 display-5 text-white-50">
                        DOCTORS
                    </div>
                    <div class="ml-auto text-light mr-2 h5">
                        <strong> <span id="card-doctor" class="badge badge-primary badge-pill">0</span></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-danger-light">
                <div class="h1">
                    <i class="fas fa-pills text-light"></i>
                </div>
                <div class="row">
                    <div class="mr-auto ml-2 display-5 text-white-50">
                        Medicines
                    </div>
                    <div class="ml-auto text-light mr-2 h5">
                        <strong> <span id="card-medicine" class="badge badge-danger badge-pill">0</span></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-success-light">
                <div class="h1">
                    <i class="fas fa-flask text-light"></i>
                </div>
                <div class="row">
                    <div class="mr-auto ml-2 display-5 text-white-50">
                        Generics
                    </div>
                    <div class="ml-auto text-light mr-2 h5">
                        <strong> <span id="card-generic" class="badge badge-success badge-pill">0</span></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-info-light">
                <div class="h1">
                    <i class="fas fa-file-prescription text-light"></i>
                </div>
                <div class="row">
                    <div class="mr-auto ml-2 display-5 text-white-50">
                        Prescriptions <br> <div class="text-light">Today</div>
                    </div>
                    <div class="ml-auto text-light mt-2 mr-2 h5">
                        <strong> <span id="card-presc" class="badge badge-info badge-pill">0</span></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-warning-light">
                <div class="h1">
                    <i class="fas fa-portrait text-light"></i>
                </div>
                <div class="row">
                    <div class="mr-auto ml-2 display-5 text-white-50">
                        Doctor <br> Applications
                    </div>
                    <div class="ml-auto text-light mt-2 mr-2 h5">
                        <strong> <span id="card-doctor-application" class="badge badge-warning text-light badge-pill">0</span></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card card-hover shadow">
            <div class="card-body bg-purple-light">
                <div class="h1">
                    <i class="fas fa-file-medical text-light"></i>
                </div>
                <div class="row">
                    <div class="mr-auto ml-2 display-5 text-white-50">
                        Medicine <br> Applications
                    </div>
                    <div class="ml-auto text-light mt-2 mr-2 h5">
                        <strong> <span id="card-medicine-application" class="badge bg-purple text-light badge-pill">0</span></strong>
                    </div>
                </div>
            </div>
        </div>
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
                $('#card-medicine').html(result[1]);
                $('#card-generic').html(result[2]);
                $('#card-presc').html(result[3]);
                $('#card-doctor-application').html(result[4]);
                $('#card-medicine-application').html(result[5]);
            }
        });
    }
});
</script>
@endsection