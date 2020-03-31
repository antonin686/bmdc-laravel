@extends('layouts.medicine')

@section('title', 'All Medicine')

@section('subcontent')
<div class="row my-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="h2 text-secondary">
                    Medicine List (A-Z)
                </div>
                <div class="row">
                    @foreach ($meds as $med)
                    <div class="col-md-4 mt-4">
                        <div class="card-med">
                            <div class="card-body">
                                <a href="{{ route('publicMedicine.show', $med->id) }}">
                                    <div class="h3 med-info">
                                        <div class="text-dark">{{ $med->brand_name }} <small> {{ $med->strength}}
                                            </small></div>
                                    </div>
                                    <div class="h6 med-info">
                                        {{ $med->dosage_form}} <br> {{ $med->generic_name}}
                                        <div class="med-info text-primary">{{ $med->company}}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
            window.location.href = `/publicMedicine/${id}`;
        }
    });
});
</script>
@endsection