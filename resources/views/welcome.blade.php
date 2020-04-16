@extends('layouts.public')

@section('content')
<div class="col">

    <div class="col-md-12">
        <div class="h1 card-title text-secondary"> <span><i class="fas fa-newspaper"></i></span> News Feed</div>
        <div id="international-news" class="row">

        </div>
    </div>

</div>

<script>
$(document).ready(function() {
    getInternationalNews();

    function getInternationalNews() {

        $.ajax({
            url: "{{ route('ajax.getInternationalNews')}}",
            method: "GET",
            dataType: "json",
            success: function(result) {
                console.log(result);
                var html = "";

                result.forEach(news => {
                    html += `<div class="col-md-4 mt-3">`
                        html += `<div class="card card-hover shadow h-100">`
                            html += `<img class="card-img-top" src="${news.urlToImage}" alt="image">`
                            html += `<div class="card-body d-flex flex-column">`

                                html += `<div class="h5 card-title">${news.title}</div>`
                                html += `<p class="card-text">${news.description}</p>`
                                html += `<a href="${news.url}" class="btn btn-primary mt-auto">Visit</a>`

                            html += `</div>`
                        html += `</div>`
                    html += `</div>`
                });

                $('#international-news').html(html);
            }
        });
    }
});
</script>
@endsection
