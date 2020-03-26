@extends('layouts.public')

@section('content')
<nav class="navbar navbar-dark bg-teal">
    <div class="col-md-10 mx-auto my-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <button id="btn-option" class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Options</button>
                <div class="dropdown-menu">
                    <button id="option-brands" class="dropdown-item btn btn-link">Brands</button>
                    <button id="option-generics" class="dropdown-item btn btn-link">Generics</button>
                </div>
            </div>
            <input type="text" id="search-text" class="form-control" placeholder="Search by brand">
            <input type="hidden" id="search-type" value="1">
        </div>

    </div>

</nav>
<div class="container parent-overlay">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div id="medList" class="col-md-12 ">

            </div>
        </div>
        <div class="col-md-12">
            @yield('subcontent')
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    $('#option-brands').click(function() {

        $('#btn-option').html('Brands');
        $('#search-text').attr("placeholder", "Search By Brands");
        $('#search-type').val('1');
    });

    $('#option-generics').click(function() {

        $('#btn-option').html('Generics');
        $('#search-text').attr("placeholder", "Search By Generic");
        $('#search-type').val('2');
    });

    $('#search-text').keyup(function() {
        var query = $(this).val();
        var option = $('#search-type').val();

        if (query != '') {
            if (option == 1) {
                getMedList(query);
            } else if (option == 2) {
                getGenericList(query);
            }

        } else {
            $('#medList').html('');
        }
    });

    function getMedList(query) {
        $.ajax({
            url: `/ajax/getMedList/${query}`,
            method: "GET",
            dataType: "json",
            success: function(result) {
                console.log(result);

                if (result.length > 0) {
                    $('#medList').fadeIn();

                    var html = '<ul class="search-ul shadow p-3  bg-white rounded"> ';

                    result.forEach(element => {
                        html +=
                            `<li class="search-li"> <a href="/publicMedicine/${element.id}"> ${element.brand_name} <small>${element.strength}</small> </a> </li> `;
                    });

                    html += " </ul>";

                    $('#medList').html(html);
                } else {
                    $('#medList').html('');
                }

            }
        });
    }

    function getGenericList(query) {
        $.ajax({
            url: `/ajax/getGenericList/${query}`,
            method: "GET",
            dataType: "json",
            success: function(result) {
                console.log(result);

                if (result.length > 0) {
                    $('#medList').fadeIn();

                    var html = '<ul class="search-ul shadow p-3  bg-white rounded"> ';

                    result.forEach(element => {
                        html +=
                            `<li class="search-li"> <a href="/publicMedicine/generic/show/${element.id}"> ${element.generic_name} </a> </li> `;
                    });

                    html += " </ul>";

                    $('#medList').html(html);
                } else {
                    $('#medList').html('');
                }

            }
        });
    }

});
</script>

@endsection