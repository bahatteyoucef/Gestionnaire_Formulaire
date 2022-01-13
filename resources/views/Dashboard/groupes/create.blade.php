@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            
            <h4 class="card-title">Add a new survey</h4>
            <hr/>

            <form class="forms-sample" method="POST" action="{{route('surveys.store')}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="titre_formulaire" id="titre_formulaire" placeholder="title">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="desc_formulaire" id="desc_formulaire"></textarea>
                </div>

                <div class="form-group">
                    <label for="administrator">Administrator</label>
                    <input type="text" class="form-control" name="admin_formulaire" id="admin_formulaire" placeholder="administrator">
                </div>

                <div class="form-group">
                    <label for="date_expiration">Date of expiration</label>
                    <input type="date" class="form-control" name="expiration_formulaire" id="expiration_formulaire" placeholder="date of expiration">
                </div>
                
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection