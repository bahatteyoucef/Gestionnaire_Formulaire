@extends('template.mobile.master')
@section('title') Mobile @endsection

@section('main_section')

<div id="formulaires_div" style="margin-top:99px;">
    
    @foreach($formulaires as $formulaire)
        <a style="text-decoration: none !important;" href="{{route('formulaire.mobilevisualisation',$formulaire->id_formulaire)}}">
            <div class="card" id="formulaire_informations_card">
                <div class="card-body" id="formulaire_informations_card_body">

                    <table id="formulaire_informations">
                        <thead>
                            <tr>
                                <th id="formulaire_informations_icon">
                                    <i class="mdi mdi-clipboard-check" style="color:#34B1AA !important;font-size:35px;"></i>
                                </th>

                                <th id="formulaire_informations_description">
                                    <div id="formulaire_informations_titre">
                                        <h5 style="margin: 0px;">   <b>{{$formulaire->titre_formulaire}}       </b></h5>
                                    </div>

                                    <div id="formulaire_informations_points">
                                        <span>                          Points : 50</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                    
                    <table id="formulaire_informations_standard">
                        <thead>
                            <tr>
                                <th id="formulaire_informations_standard_icon">
                                    <i class="mdi mdi-fire " style="color:#DD4A48 !important;font-size:25px"></i>
                                </th>

                                <th id="formulaire_informations_standard_message">
                                    <span>Nouvelle enquete ! Completez-la maintenant</span>
                                </th>

                            </tr>
                        </thead>
                    </table>

                    <hr/>

                    <div id="formulaire_informations_commentaire">
                        <span>{{$formulaire->description_formulaire}}</span>
                    </div>

                </div>
            </div>
        </a>
    @endforeach
    
</div>

<div id="evaluations_div" style="margin-top:99px;">
    
    <div class="card slide_form_right" id="evaluation_informations_card">
        <div class="card-body" id="evaluation_informations_card_body">

            <table id="evaluation_informations">
                <thead>
                    <tr>
                        <th id="evaluation_informations_icon">
                            <img src="/storage/{{$evaluation->icon_evaluation}}" width="50px"/>
                        </th>

                        <th id="evaluation_informations_description" style="margin-right:200px;">
                            
                            <div id="evaluation_informations_titre" style="float:left;">
                                <h5 style="margin: 0px;"><b>{{$evaluation->titre_evaluation}}</b></h5>
                            </div>

                            <div id="evaluation_informations_points">
                                <span>Football</span>
                            </div>

                        </th>

                        <th id="evaluation_passer" style="position: absolute;right: 15px;top:25px;" onclick="passerEvaluation()">
                            <span style="color:lightgray;font-weight: lighter;font-size:smaller;">Passer</span>
                        </th>
                    </tr>
                </thead>
            </table>

            <hr/>

            <div id="evaluation_informations_commentaire">
                <span>{{$evaluation->question_evaluation}}</span>
            </div>

            <hr />

            <div>
                @include('template.mobile.emojis.emojis')
            </div>

        </div>
    </div>
    
</div>

@endsection

@include('Includes.MobileIndex')
