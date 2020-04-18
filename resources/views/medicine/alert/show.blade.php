@extends('layouts.admin')

@section('title', 'Medicine Alert Info')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Medicine Alert Info</div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card card-body">
                            <div class="row">
                                <div class="ml-3 h5">Meidcine Details</div>
                                <div class="mr-3 ml-auto">
                                    <button type="button" id="btn-toggle" class="btn btn-info">Show/Hide
                                        Details</button>
                                </div>
                            </div> <br>

                            <table class="table">
                                <tbody style="display:none" id="table-toggle">
                                    <tr class="bg-dark text-light">
                                        <th>#</th>
                                        <td>{{ $medicine->id }}</td>
                                    </tr>

                                    <tr>
                                        <th>Brand Name</th>
                                        <td>{{ $medicine->brand_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Dosage Form</th>
                                        <td>{{ $medicine->dosage_form }}</td>
                                    </tr>

                                    <tr>
                                        <th>Generic Name</th>
                                        <td> <a href="{{ route('generic.show',$generic->id)}}">
                                                {{ $generic->generic_name}}</a> </td>
                                    </tr>

                                    <tr>
                                        <th>Company</th>
                                        <td> {{ $medicine->company }} </td>
                                    </tr>

                                    <tr>
                                        <th>Price</th>
                                        <td> ৳ {{ $medicine->price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    

                    <div class="col-md-12 mx-auto mx-0 mt-3">
                        <div class="card">
                            <div class="card-body">
                            <div class="mb-3 h5">Meidcine Alert Details</div>
                            <table class="table" id="table">
                                <tbody>
                                    <tr class="bg-dark text-light">
                                        <th>#</th>
                                        <td>{{ $med_alert->id }}</td>
                                    </tr>

                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $med_alert->alert_gender }}</td>
                                    </tr>

                                    <tr>
                                        <th>Age Range (Low)</th>
                                        <td>{{ $med_alert->age_range_low }}</td>
                                    </tr>

                                    <tr>
                                        <th>Age Range (High)</th>
                                        <td> {{ $med_alert->age_range_high }} </td>
                                    </tr>

                                    <tr>
                                        <th>Alert Range</th>
                                        <td> {{ $med_alert->alert_range }}  {{ $med_alert->med_unit }}</td>
                                    </tr>
                                 
                                    <tr>
                                        <th>Max Duration</th>
                                        <td>{{ $med_alert->max_duration }} {{ $med_alert->duration_unit }} </td>
                                    </tr>

                                    <tr>
                                        <th>Alert For</th>
                                        <td>{{ $med_alert->alert_for }}</td>
                                    </tr>

                                </tbody>
                            </table>
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