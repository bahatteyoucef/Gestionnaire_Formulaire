@extends('template.master')
@section('title') Dashboard @endsection

@section('main_section')

<div class="content-wrapper">
  <div class="card">
    <div class="card-body">

      <table class="table table-borderless" id="mobile_divs">
        <thead>
          <tr>
            <th scope="col" style="width: 50%" class="text-center table-mobile-view"></th>
            <th scope="col" style="width: 50%" class="text-center table-mobile-view"></th>
          </tr>
        </thead>
        
        <tbody>

          <tr>
            <td class="text-center" style="width: 50%">
              <div onclick="InfoPOSFunctionShow()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">                
                <i class="mdi mdi-store" style="font-size: 25px"></i>
                <br/>
                <br/>
                <span>Info POS</span>
              </div>
            </td>  

            <td class="text-center" style="width: 50%">
              <div onclick="AchatsFunctionShow()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-cash" style="font-size: 25px"></i>
                <br/>
                <br/>
                <span>Achats</span>
              </div>
            </td>  
          </tr>

          <tr>
            
            <td class="text-center" style="width: 50%">
              <div onclick="FrigosFunctionShow()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-fridge" style="font-size: 25px"></i>
                <br/>
                <br/>
                <span>Frigos</span>
              </div>
            </td>  

            <td class="text-center">
              <div onclick="AuditFunctionShow()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-clipboard-check" style="font-size: 25px"></i>
                <br/>
                <br/>
                <span>Audit</span>
              </div>
            </td>  
          </tr>
 
          <tr>
            <td class="text-center" style="width: 50%">
              <div onclick="PLVExterieursFunctionShow()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-fridge" style="font-size: 25px"></i>
                <br/>
                <br/>
                <span>PLV</span>
                <br/>
                <span>Exterieur</span>
              </div>
            </td>  

            <td class="text-center" style="width: 50%">
              <div onclick="PLVInterieursFunctionShow()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-clipboard-check" style="font-size: 25px"></i>
                <br/>
                <br/>
                <span>PLV</span>
                <br/>
                <span>Interieur</span>
              </div>
            </td>  
          </tr>

          <tr>
            <td class="text-center" style="width: 50%">
              <div onclick="ProduitsFunctionShow()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-food" style="font-size: 25px"></i>
                <br/>
                <br/>
                <span>Photo</span> 
                <br/>
                <span>Produits</span>
              </div>
            </td>  

            <td class="text-center" style="width: 50%">
              <div onclick="FacingsFunctionShow()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-crosshairs-gps" style="font-size: 25px"></i>
                <br/>
                <br/>
                <span>Facings</span>
              </div>
            </td>  
          </tr>
          
        </tbody>
      </table>

      <div class="" id="formulaire_form">
        {!! form($form) !!}
      </div>

    </div>
  </div>
</div>

@endsection

@include('Includes.MobileFormulaireVisualisation')
@include('Includes.Preformulaire')
