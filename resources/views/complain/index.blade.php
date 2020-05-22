@extends('layouts.admin')

@section('title', 'All complainription')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">
                Complain List
            </div>
            <div class="card-body">
                @if(session()->has('redMessage'))
                <p class="alert alert-danger mb-3">   
                    {{session()->get('redMessage')}} <br>
                </p>
                @endif
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif

                <div class="card card-body">
                    <table class="table table-hover table-responsive-sm table-striped" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Citizen</th>
                                <th scope="col">Complain Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complains as $complain)
                            <tr id="{{ $complain->id }}">
                                <td>{{ $complain->id }}</td>
                                <td>{{ $complain->first_name }} {{ $complain->last_name }}</td>
                                <td>{{ $complain->complain_type }}</td>
                                <td>{{ $complain->status }}</td>
                                <td>{{ $complain->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#table').DataTable();
    $('#table').on('click', 'tr', (event) => {
        var id = $(event.currentTarget).attr("id");
        if (id != null) {
            window.location.href = `/admin/complain/${id}`;
        }
    });
});
</script>
@endsection