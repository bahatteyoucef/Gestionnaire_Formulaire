{{@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <div class="d-sm-flex justify-content-between align-items-start">

        <div>
          <h4 class="card-title card-title-dash">Achats</h4>
          <p class="card-subtitle card-subtitle-dash">50+ new surveys has been added today! </p>
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
                Marque de produit 
              </th>

              <th class="text-center">
                Type de produit
              </th>

              <th class="text-center">
                Fréquence Achat 
              </th>

              <th class="text-center">
                Source Achat 
              </th>

              <th class="text-center">
                Nom de Grossiste
              </th>

              <th class="text-center">
                Qte vendu par Semaine 
              </th>

              <th class="text-center">
                Qte vendu par Jour 
              </th>

            </tr>
          </thead>

          <tbody>

            <?php 
                $i  =   1;
            ?>

            @foreach($achats as $achat)  

              <tr>
                <td class="text-center">
                    {{$i}}
                </td>

                <td class="text-center">
                    {{$achat->libelle_marque}}
                </td>

                <td class="text-center">
                    {{$achat->libelle_type_produit}}
                </td>

                <td class="text-center">
                    {{$achat->montant_achat}}
                </td>

                <td class="text-center">
                    
                    <?php
                        $key    =   "marque_de_produit_(achat)";
                    ?>
                        {{$achat->$key}}
                </td>

                <td class="text-center">
                    {{$achat->nom_de_grossiste}}
                </td>

                <td class="text-center">
                    {{$achat->qte_vendu_par_semaine}}
                </td>

                <td class="text-center">
                    {{$achat->qte_vendu_par_jour}}
                </td>

              </tr>

              <?php
                $i  =   $i+1;
              ?>

            @endforeach

          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>

@endsection}}