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

                        @if($complain->status == 0)
                        <div class="col-md-12">
                            <div class="row">
                                <button type="button" id="btn-accept" class="btn btn-success">
                                    Accept
                                </button>
                                <button type="button" id="btn-reject" class="btn btn-danger ml-3">
                                    Reject
                                </button>
                            </div>
                        </div>
                        @elseif($complain->status == 1)
                        <div class="col-md-8 ml-0 pl-0">

                            <br>
                            <strong>Remark:</strong>
                            <hr>
                            <p>
                                {!! nl2br($complain->remark) !!}
                            </p>

                        </div>
                        @elseif($complain->status == 2)
                        <div class="col-md-12 ml-0 pl-0">
                            <br>
                            <p class="alert alert-danger mb-3">
                                Complain has been rejected
                            </p>
                            <br>
                            <strong>Reason:</strong>
                            <hr>
                            <p>
                                {!! nl2br($complain->remark) !!}
                            </p>
                          
                            
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="accept-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accept-modalLabel">Remark</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('complain.update', $complain->id) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">

                    <input type="hidden" id="submit-type" name="submit_type">
                    <div class="form-group">
                        <textarea class="form-control" name="remark" id="remark" rows="3" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="btn-done" type="submit" class="btn btn-success">Done</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {

    $('#btn-accept').click(() => {
        $('#submit-type').val('accept');
        $('#btn-accept').removeClass('btn-danger');
        $('#btn-accept').addClass('btn-success');
        $('#accept-modalLabel').html('Remark');
        $('#form-modal').modal('show');
    });

    $('#btn-reject').click(() => {
        $('#submit-type').val('reject');
        $('#btn-done').removeClass('btn-success');
        $('#btn-done').addClass('btn-danger');
        $('#accept-modalLabel').html('Reason');
        $('#form-modal').modal('show');
    });

});
</script>

@endsection