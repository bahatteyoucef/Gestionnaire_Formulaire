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
                Marque de PLV Interieur 
              </th>

              <th class="text-center">
                Type de PLV Interieur
              </th>

              <th class="text-center">
                Photo de PLV Interieur 
              </th>

            </tr>
          </thead>

          <tbody>

            <?php 
                $i  =   1;
            ?>

            @foreach($plvInterieurs as $plvInterieur)  

              <tr>
                <td class="text-center">
                    {{$i}}
                </td>

                <td class="text-center">
                    {{$plvInterieur->libelle_marque}}
                </td>

                <td class="text-center">
                    {{$plvInterieur->type_plv_interieur}}
                </td>

                <td class="text-center">
                    {{$plvInterieur->photo_plv_interieur}}
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