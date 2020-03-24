@extends('layouts.admin')

@section('title', 'Doctor Info')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header card-header-bg">Doctor Info</div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-body">
                            <table class="table" id="table">
                                <tbody>
                                    <tr class="bg-dark text-light">
                                        <th>#</th>
                                        <td>{{ $doc->registration_id }}</td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $doc->full_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Speciality</th>
                                        <td>{{ $doc->speciality }}</td>
                                    </tr>

                                    <tr>
                                        <th>Place Of Work</th>
                                        <td> {{ $doc->work_place }}</td>
                                    </tr>

                                    <tr>
                                        <th>Degree</th>
                                        <td> {{ $doc->basic_degree }},  {{ $doc->advance_degree }}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone</th>
                                        <td> {{ $doc->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th>Email</th>
                                        <td> {{ $doc->email }}</td>
                                    </tr>                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{$doc->img_path}}" class="card-img-top" alt="img">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <a href="{{ route('doctor.edit', $doc->id )}}" class="btn btn-info m-3">Edit Profile</a>
                    <form class="m-3" action="{{ route('doctor.destroy', $doc->id )}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection