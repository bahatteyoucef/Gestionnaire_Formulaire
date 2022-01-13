@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <div class="d-sm-flex justify-content-between align-items-start">
        <div>
          <h4 class="card-title card-title-dash">Groups</h4>
          <p class="card-subtitle card-subtitle-dash">50+ new groups has been added today in this form ! </p>
        </div>

        <div>
          <a href="{{route('formulaire_groupes.create',$formulaire->id_formulaire)}}"> 
            <button type="button" class="btn btn-primary"> Ajouter un nouveau Groupe </button> 
          </a>
        </div>

      </div>

      <p class="card-description"></p>

      <div class="table-responsive pt-3">
        <table class="table table-bordered">

          <thead>
            <tr>
              <th class="text-center">
                #ID
              </th>

              <th class="text-center">
                Status
              </th>

              <th class="text-center">
                Ordre
              </th>

              <th class="text-center">
                Nom
              </th>

              <th class="text-center">
                Administrateur
              </th>

              <th class="text-center">
                Date de Creation
              </th>

              <th class="text-center">
                Options
              </th>

            </tr>
          </thead>

          <tbody>

            @foreach($groupes as $groupe)  

              <tr>
                <td class="text-center">
                  {{$groupe->id_groupe}}
                </td>

                @if($groupe->etat_groupe == 1)
                  
                  <td class="text-center">
                    <div class="badge badge-opacity-success">Activated</div>
                  </td>

                @else
                  
                  <td class="text-center">
                    <div class="badge badge-opacity-warning">Disabled</div>
                  </td>

                @endif

                <td class="text-center">
                  {{$groupe->ordre_groupe}}
                </td>

                <td class="text-center">
                  {{$groupe->nom_groupe}}
                </td>

                <td class="text-center">
                  Ahmed Bourada
                </td>

                <td class="text-center">
                  {{$groupe->created_at}}
                </td>

                <td class="text-center">
                  <button class="btn btn-warning dropdown-toggle btn-sm" type="button" id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-world"></i>
                  </button>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                    <a class="dropdown-item" href="{{route('formulaire_groupes_questions.index',[$formulaire->id_formulaire,$groupe->id_groupe])}}">Lister les Questions</a>
                    <a class="dropdown-item" href="{{route('formulaire_groupes_questions.create',[$formulaire->id_formulaire,$groupe->id_groupe])}}">Ajouter une question</a>
                    
                    @if($groupe->etat_groupe == 0)
                      <a class="dropdown-item" href="{{route('formulaire_groupes.activateDisactivate',[$formulaire->id_formulaire,$groupe->id_groupe])}}">Activate</a>
                    @endif
                    
                    @if($groupe->etat_groupe == 1)
                      <a class="dropdown-item" href="{{route('formulaire_groupes.activateDisactivate',[$formulaire->id_formulaire,$groupe->id_groupe])}}">Disactivate</a>
                    @endif

                  </div>
                </td>

              </tr>

            @endforeach

          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>

@endsection