@extends('layouts.admin')

@section('title', 'Complain')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Complain</div>
            <div class="card-body">
                <div class="col">
                    
                    <div class="col-md-12">
                        
                        <hr>
                        <div class="h5">Complainer Info</div>
                        <hr>

                        <div class="row">
                            <div class="col-md-3"> Mr./Ms./Mrs. </div>

                            <div class="col-md-3">
                                [{{ $citizen->first_name }} {{ $citizen->last_name }}]
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"> DOB </div>

                            <div class="col-md-3">
                                [{{ $citizen->dob }}]
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"> Address </div>

                            <div class="col-md-9">
                                [{{ $citizen->current_address }}]
                            </div>
                        </div> 

                        <hr>
                        <div class="h5">Complain</div>
                        <hr>

                        <div class="row">
                            <div class="col-md-3"> <strong>Type</strong> </div>

                            <div class="col-md-9">
                                {{ $complain->complain_type }}
                            </div>
                        </div> 
                        
                       
                        <div class="col-md-8 ml-0 pl-0">

                            <br>
                            <strong>Body:</strong>
                            <hr>
                            <p>
                                {!! nl2br($complain->complain_body) !!}
                            </p>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection