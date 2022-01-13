@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            
            <h4 class="card-title">Add a new Question to the Survey : {{$formulaire->titre_formulaire}}</h4>
            <hr/>

            <form class="forms-sample" method="POST" action="{{route('formulaire_groupes_questions.store', [$formulaire->id_formulaire,$groupe->id_groupe])}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="id_groupe">Groupe</label>
                    <br/>
                    
                    <div class="div-btn-groupe">
                        <button class="btn-groupe btn btn-sm dropdown-toggle" id="id_groupe" 
                            type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        
                        <input type="text" name="id_groupe_value" value="{{$groupe->id_groupe}}" id="id_groupe_value" hidden>
                        <div id="dropdown-menu-groupe" class="dropdown-menu-groupe dropdown-menu w-100, mt-0" 
                        aria-labelledby="id_groupe" value="{{$groupe->nom_groupe}}">
                            
                            <li><a name="id_groupe" class="dropdown-groupe-item dropdown-item position-static" 
                            value="{{$groupe->id_groupe}}">{{$groupe->nom_groupe}}</a></li>
                        
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="description_question">Description</label>
                    <input type="text" class="form-control" name="description_question" id="description_question" placeholder="">
                </div>

                <div class="form-group">
                    <label for="id_type_question">Type</label>
                    <br/>
                    
                    <button class="btn btn-sm dropdown-toggle" id="id_type_question" 
                        type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>

                    <input type="text" name="id_type_question_value" id="id_type_question_value" hidden>
                    <div class="dropdown-menu w-100, mt-0" aria-labelledby="id_groupe">
                        @foreach($types_question as $type_question)
                            <li><a class="dropdown-type-groupe-item dropdown-item position-static" 
                            value="{{$type_question->id_type_question}}" >{{$type_question->description_type_question}}</a></li>
                        @endforeach
                    </div>

                    <div class="form-group" id="selection_inputs_div" hidden>
                        <button type="button" class="btn btn-sm btn-primary" id="selection_inputs_button" onclick="selection_inputs_create()"> Ajouter une option </button><br />
                        <br />
                        
                        <div class="form-group" id="selection_inputs_labels_div">
                        </div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="obligatoire_question">Mandatory/Optional</label>

                    <div class="form-check">
                    <input type="radio" class="form-check-input" name="obligatoire_question" id="obligatoire_question_1" value="1" style="margin-left:5px;" checked>
                        <label class="form-check-label">
                            Mandatory
                        </label>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="obligatoire_question" id="obligatoire_question_2" value="0" style="margin-left:5px;">
                        <label class="form-check-label">
                            Optional
                        </label>
                    </div>

                </div>

                <div class="form-group">
                    <label for="ordre_question">Order</label>
                    <input type="text" class="form-control" name="ordre_question" id="ordre_question" placeholder="">
                </div>
                
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection

@include('Includes.InitiateGr')
