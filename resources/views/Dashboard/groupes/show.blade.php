@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">
                <div>
                    <h4 class="card-title card-title-dash"> {{$formulaire->titre_formulaire}} </h4>
                    <p class="card-subtitle card-subtitle-dash">{{$formulaire->created_at}} </p>
                </div>

                <div>
                    <button type="button" class="btn btn-primary"> Add a new question </button>
                    <button type="button" class="btn btn-success"> Add a new groupe </button>
                </div>

            </div>

            <br />

            <div class="d-sm-flex justify-content-between align-items-start">

                <p class="card-description col-md-5 grid-margin stretch-card">
                    {{$formulaire->desc_formulaire}}
                </p>

            </div>

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
                                Administrator
                            </th>

                            <th class="text-center">
                                Start
                            </th>

                            <th class="text-center">
                                Expiration
                            </th>

                            <th class="text-center">
                                Participants
                            </th>

                            <th class="text-center">
                                Groups
                            </th>

                            <th class="text-center">
                                Questions
                            </th>

                            <th class="text-center">
                                Options
                            </th>
                        </tr>
                    </thead>

                    <tbody>

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
                                    <div class="badge badge-opacity-warning">Disabled</div>
                                </td>

                            @endif

                            <td class="text-center">
                                Ahmed Bourada
                            </td>

                            <td class="text-center">
                                {{$formulaire->created_at}}
                            </td>

                            <td class="text-center">
                                {{$formulaire->expiration_formulaire}}
                            </td>

                            <td class="text-center">
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>

                            <td class="text-center">
                                15
                            </td>

                            <td class="text-center">
                                64
                            </td>

                            <td class="text-center">
                                <button class="btn btn-warning dropdown-toggle btn-sm" type="button" id="dropdownMenuIconButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-world"></i>
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4">
                                    <a class="dropdown-item" href="#">View List of Questions</a>
                                    <a class="dropdown-item" href="#">View List of Groupes</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Disable</a>
                                </div>
                            </td>

                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection