@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start">

                <div>
                    <h4 class="card-title card-title-dash">Reponses</h4>
                    <p class="card-subtitle card-subtitle-dash">50+ nouveau reponses ont ete ajoute aujordhui !</p>
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
                                Nom Enquetteur
                            </th>

                            <th class="text-center">
                                Nom POS
                            </th>

                            <th class="text-center">
                                Type POS
                            </th>

                            <th class="text-center">
                                Nom Gerant
                            </th>

                            <th class="text-center">
                                Nom Proprietaire
                            </th>

                            <th class="text-center">
                                Numero Telephone 1
                            </th>

                            <th class="text-center">
                                Numero Telephone 2
                            </th>

                            <th class="text-center">
                                Willaya
                            </th>

                            <th class="text-center">
                                Commune
                            </th>

                            <th class="text-center">
                                Adresse Magasin
                            </th>

                            <th class="text-center">
                                Quartier
                            </th>

                            <th class="text-center">
                                Repere Magasin
                            </th>

                            <th class="text-center">
                                Latitude POS
                            </th>

                            <th class="text-center">
                                Longitude POS
                            </th>

                            <th class="text-center">
                                Zone Achalendage
                            </th>

                            <th class="text-center">
                                Surface Magasin
                            </th>

                            <th class="text-center">
                                Nombre Façade
                            </th>

                            <th class="text-center">
                                Caisse Enregisteurse
                            </th>

                            <th class="text-center">
                                Caise Automatique
                            </th>

                            <th class="text-center">
                                Self Service
                            </th>

                            <th class="text-center">
                                Comptoire Caisse
                            </th>

                            <th class="text-center">
                                Espace Stockage
                            </th>

                            <th class="text-center">
                                Stock Chaud Boisson
                            </th>

                            <th class="text-center">
                                Etat Pos
                            </th>

                            <th class="text-center">
                                La Marque La Plus Demander
                            </th>

                            <th class="text-center">
                                Conseil/Recomendation
                            </th>

                            <th class="text-center">
                                Date Creation
                            </th>

                            <th class="text-center">
                                Options
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                            $i  =   1;
                        ?>

                        @foreach($reponses as $reponse)

                        <tr>
                            <td class="text-center">
                                {{$i}}
                            </td>

                            <td class="text-center">
                                {{$reponse->name}}
                            </td>

                            <td class="text-center">
                                {{$reponse->nom_de_pos}}
                            </td>

                            <td class="text-center">
                                {{$reponse->type_de_magasin}}
                            </td>

                            <td class="text-center">
                                {{$reponse->nom_gerant}}
                            </td>

                            <td class="text-center">
                                {{$reponse->nom_proprietaire}}
                            </td>

                            <td class="text-center">
                                {{$reponse->numero_de_telephone_1}}
                            </td>

                            <td class="text-center">
                                {{$reponse->numero_de_telephone_2}}
                            </td>

                            <td class="text-center">
                                {{$reponse->libelle_willaya}}
                            </td>

                            <td class="text-center">
                                {{$reponse->libelle_commune}}
                            </td>

                            <td class="text-center">
                                {{$reponse->adresse_de_magasin}}
                            </td>

                            <td class="text-center">
                                {{$reponse->quartier}}
                            </td>

                            <td class="text-center">
                                {{$reponse->repere_de_magasin}}
                            </td>

                            <td class="text-center">
                                {{$reponse->latitude_pos}}
                            </td>

                            <td class="text-center">
                                {{$reponse->longitude_pos}}
                            </td>

                            <td class="text-center">
                                {{$reponse->libelle_zone_achalendage}}
                            </td>

                            <td class="text-center">
                                {{$reponse->surface_de_magasin}}
                            </td>

                            <td class="text-center">
                                {{$reponse->nombre_de_façade}}
                            </td>

                            <td class="text-center">
                                {{$reponse->disponibilité_caisse_enregisteurse}}
                            </td>

                            <td class="text-center">
                                {{$reponse->caise_automatique}}
                            </td>

                            <td class="text-center">
                                {{$reponse->self_service}}
                            </td>

                            <td class="text-center">
                                {{$reponse->comptoire_caisse}}
                            </td>

                            <td class="text-center">
                                {{$reponse->espace_de_stockage}}
                            </td>

                            <td class="text-center">
                                {{$reponse->stock_chaud_boisson}}
                            </td>

                            <td class="text-center">
                                {{$reponse->etat_pos}}
                            </td>

                            <td class="text-center">
                                {{$reponse->quel_la_marque_la_plus_demander}}
                            </td>

                            <td class="text-center">
                                {{$reponse->conseil_ou_recomendation}}
                            </td>

                            <td class="text-center">
                                {{$reponse->created_at}}
                            </td>

                            <td class="text-center">
                                <button class="btn btn-warning dropdown-toggle btn-sm" type="button" id="dropdownMenuIconButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-world"></i>
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton4">

                                    <a class="dropdown-item" href="{{route('POS.achats'         ,$reponse->id_pos)}}">Achats</a>
                                    <a class="dropdown-item" href="{{route('POS.facings'        ,$reponse->id_pos)}}">Facings</a>
                                    <a class="dropdown-item" href="{{route('POS.frigos'         ,$reponse->id_pos)}}">Frigos</a>
                                    <a class="dropdown-item" href="{{route('POS.plvInterieurs'  ,$reponse->id_pos)}}">PLV Interieur</a>
                                    <a class="dropdown-item" href="{{route('POS.plvExterieurs'  ,$reponse->id_pos)}}">PLV Exterieur</a>
                                    
                                </div>
                            </td>

                        </tr>

                        <?php
                            $i  =   $i  +   1
                        ?>

                        @endforeach



                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection