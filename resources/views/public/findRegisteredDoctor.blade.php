@extends('layouts.public')

@section('title', 'Find Registered Doctor')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3 pt-3">
        <div class="card">
            <div class="card-body">
                <div class="col">
                    <div class="col-md-8 mx-auto mt-3 pt-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="text-search" placeholder="Doctor's ID">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"
                                    id="button-search">Search</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="card-header bg-light text-dark">Doctor's Information</div>
                            <div class="card-body">
                                <div style="display:none" id="card-data">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table" id="table">
                                                <tbody>
                                                    <tr class="bg-dark text-light">
                                                        <th>#</th>
                                                        <td id="id"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td id="name"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td id="email"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Speciality</th>
                                                        <td id="speciality"></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Degree</th>
                                                        <td id="degree"></td>
                                                    </tr>

                                                    <tr>
                                                        <th>Institute</th>
                                                        <td id="institute"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img id="image" src="" class="card-img-top" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    $("#button-search").click(function() {
        var id = $("#text-search").val();
        getDoctorDetails(id);
    });

    function getDoctorDetails(id) {
    
        $.ajax({
            url: `/ajax/getDoctorDetails/${id}`,
            method: "GET",
            dataType: "json",
            success: function(result) {
                result = result[0];

                //console.log(result.id);
                $("#card-data").show();
                $("#id").html(result.id);
                $("#name").html(result.full_name);
                $("#email").html(result.email);
                $("#degree").html(result.degree);
                $("#speciality").html(result.speciality);
                $("#institute").html(result.institute);       
                $("#image").attr("src", result.img_path);      
            }
        });
    }
});
</script>
@endsection