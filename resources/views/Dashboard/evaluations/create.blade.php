@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            
            <h4 class="card-title">Ajouter une nouvelle evaluation</h4>
            <hr/>

            <form class="forms-sample" method="POST" action="{{route('evaluations.store')}}" enctype="multipart/form-data"> 
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="titre_evaluation">Titre</label>
                    <input type="text" class="form-control"                                         name="titre_evaluation"         id="titre_evaluation"       placeholder="Titre">
                </div>

                <div class="form-group">
                    <label for="question_evaluation">Question</label>
                    <input type="text" class="form-control"                                         name="question_evaluation"      id="question_evaluation"    placeholder="Question ?">
                </div>

                <div class="form-group">
                    <label for="icon_evaluation">Icon</label>
                    <input type="file" class="file-upload-browse btn btn-sm btn-success"            name="icon_evaluation"          id="icon_evaluation">
                </div>
                
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection