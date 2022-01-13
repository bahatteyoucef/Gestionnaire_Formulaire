@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            
            <h4 class="card-title">Add a new Groupe Question to the Survey : {{$formulaire->titre_formulaire}}</h4>
            <hr/>

            <form class="forms-sample" method="POST" action="{{route('formulaire_groupes.store',$formulaire->id_formulaire)}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nom_groupe">Nom Groupe</label>
                    <input type="text" class="form-control" name="nom_groupe" id="nom_groupe" placeholder="">
                </div>

                <div class="form-group">
                    <label for="description_groupe">Description</label>
                    <textarea class="form-control" name="description_groupe" id="description_groupe"></textarea>
                </div>

                <div class="form-group">
                    <label for="ordre_groupe">Order</label>
                    <input type="text" class="form-control" name="ordre_groupe" id="ordre_groupe" placeholder="">
                </div>
                
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection