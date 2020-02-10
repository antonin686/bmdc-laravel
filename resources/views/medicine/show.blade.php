@extends('layouts.admin')

@section('title', 'All Doctor')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto mt-3">
        <div class="card">
            <div class="card-header">Doctor Info</div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-body">
                            <table class="table" id="table">

                                <tbody>

                                    <tr class="bg-dark text-light">
                                        <th>#</th>
                                        <td>{{ $doc->id }}</td>

                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $doc->first_name }} {{ $doc->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Speciality</th>
                                        <td>{{ $doc->speciality }}</td>
                                    </tr>

                                    <tr>
                                        <th>Degree</th>
                                        <td> {{ $doc->degree }} </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="" class="card-img-top" alt="img">
                            <div class="card-body">
                                
                            </div>
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