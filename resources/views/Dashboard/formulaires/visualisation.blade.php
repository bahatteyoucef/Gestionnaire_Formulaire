@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
        
        <div class="" id="formulaire_form">
            {!! form($form) !!}
        </div>

    </div>
  </div>
</div>

@endsection

@include('Includes.FormulaireVisualisation')
