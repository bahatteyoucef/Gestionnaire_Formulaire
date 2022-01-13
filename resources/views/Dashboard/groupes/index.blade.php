@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <div class="d-sm-flex justify-content-between align-items-start">
        <div>
          <h4 class="card-title card-title-dash">Surveys</h4>
          <p class="card-subtitle card-subtitle-dash">50+ new surveys has been added today! </p>
        </div>

        <div>
          <a href="{{route('surveys.create')}}"> <button type="button" class="btn btn-primary"> Add new survey </button> </a>
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
                Title
              </th>

              <th class="text-center">
                Participants
              </th>

              <th class="text-center">
                Owner
              </th>

              <th class="text-center">
                Created
              </th>

              <th class="text-center">
                Options
              </th>

            </tr>
          </thead>

          <tbody>

            @foreach($formulaires as $formulaire)  

              <tr>
                <td class="text-center">
                  {{$formulaire->id_formulaire}}
                </td>

                @if($formulaire->etat_formulaire == 1)
                  
                  <td class="text-center">
                    <div class="badge badge-opacity-success">Activated</div>
                  </td>

                @else
                  
                  <td class="text-center">
                    <div class="badge badge-opacity-warning">disabled</div>
                  </td>

                @endif

                <td class="text-center">
                  {{$formulaire->titre_formulaire}}
                </td>

                <td class="text-center">
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>

                <td class="text-center">
                  Ahmed Bourada
                </td>

                <td class="text-center">
                  {{$formulaire->created_at}}
                </td>

                <td class="text-center">
                  <button class="btn btn-warning dropdown-toggle btn-sm" type="button" id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-world"></i>
                  </button>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                    <a class="dropdown-item" href="{{route('surveys.show',$formulaire->id_formulaire)}}">View Details</a>
                    <a class="dropdown-item" href="#">View List of Questions</a>
                    <a class="dropdown-item" href="#">View List of Groupes</a>
                    <a class="dropdown-item" href="#">Add Questions</a>
                    <a class="dropdown-item" href="#">Add Groupes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Disable</a>
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