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

                                <input type="text" class="form-control" id="med_id" name="med_id"
                                    value="{{ old('med_id') }}">
                            </div>

                            <div class="col">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#selectModal">
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
<div class="modal fade" id="selectModal" tabindex="-1" role="dialog" aria-labelledby="selectModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectModalLabel">Select Medicine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="search-text" placeholder="Enter Medicine Name">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-clear">Clear</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table id="table" class="table table-responsive-sm table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Dosage Form</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-medicine">
                                @foreach($medicines as $medicine)
                                <tr id="{{ $medicine->id }}">
                                    <th scope="row">{{ $medicine->id }}</th>
                                    <td>{{ $medicine->brand_name }} <small>{{ $medicine->strength }}</small> </td>
                                    <td>Otto</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="medicine-list">

                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    //$('#table').DataTable();

    $('#search-text').keyup(function() {
        var query = $(this).val().toLowerCase();
        $("#tbody-medicine tr").filter(function()  {
            $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1)
        });
        
    });

    

    $('#table').on('click', 'tr', (event) => {
        var id = $(event.currentTarget).attr("id");
        $('#med_id').val(id);
        $('#selectModal').modal('toggle');
    });

});
</script>

@endsection