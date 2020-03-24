@extends('layouts.admin')

@section('title', 'Edit Generic')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header">Edit Doctor Profile</div>
                <div class="card-body">
                    <form method="POST" action=" {{ route('generic.update', $generic->id)}} ">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="generic_name">Generic Name</label>
                            <input type="text" class="form-control" id="generic_name" name="generic_name"
                                value="{{$generic->generic_name}}">
                        </div>

                        <div class="form-group">
                            <label for="indications">Indications</label>
                            <textarea class="form-control" id="indications" name="indications" rows="3">{{$generic->indications}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="therapeutic_class">Therapeutic Class</label>
                            <textarea class="form-control" id="therapeutic_class" name="therapeutic_class"
                                rows="3">{{$generic->therapeutic_class}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="pharmacology">Pharmacology</label>
                            <textarea class="form-control" id="pharmacology" name="pharmacology" rows="3">{{$generic->pharmacology}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="dosage_administration">Dosage Administration</label>
                            <textarea class="form-control" id="dosage_administration" name="dosage_administration"
                                rows="3">{{$generic->dosage_administration}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="interaction">Interaction</label>
                            <textarea class="form-control" id="interaction" name="interaction" rows="3">{{$generic->interaction}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="contraindications">Contraindications</label>
                            <textarea class="form-control" id="contraindications" name="contraindications"
                                rows="3">{{$generic->contraindications}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="side_effects">Side Effects</label>
                            <textarea class="form-control" id="side_effects" name="side_effects" rows="3">{{$generic->side_effects}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="pregnancy">Pregnancy</label>
                            <textarea class="form-control" id="pregnancy" name="pregnancy" rows="3">{{$generic->pregnancy}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="precautions">Precautions</label>
                            <textarea class="form-control" id="precautions" name="precautions" rows="3">{{$generic->precautions}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="overdose_effects">Overdose Effects</label>
                            <textarea class="form-control" id="overdose_effects" name="overdose_effects"
                                rows="3">{{$generic->overdose_effects}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="storage_conditions">Storage Conditions</label>
                            <textarea class="form-control" id="storage_conditions" name="storage_conditions"
                                rows="3">{{$generic->storage_conditions}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Apply Changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection