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
                Marque de facings 
              </th>

              <th class="text-center">
                Type de facing
              </th>

              <th class="text-center">
                Prix 
              </th>

              <th class="text-center">
                Nombre de facing
              </th>

              <th class="text-center">
                Disponibilite
              </th>

              <th class="text-center">
                Photo
              </th>

            </tr>
          </thead>

          <tbody>

            <?php 
                $i  =   1;
            ?>

            @foreach($facings as $facing)  

              <tr>
                <td class="text-center">
                    {{$i}}
                </td>

                <td class="text-center">
                    {{$facing->libelle_marque}}
                </td>

                <td class="text-center">
                    {{$facing->libelle_type_produit}}
                </td>

                <td class="text-center">
                    {{$facing->prix}}
                </td>

                <td class="text-center">
                    
                    <?php
                        $key    =   "nombre_de_produit_(facing)";
                    ?>
                        {{$facing->$key}}
                </td>

                <td class="text-center">
                    {{$facing->disponibilité__de_la_marque}}
                </td>

                <td class="text-center">
                    {{$facing->photo_facing}}
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