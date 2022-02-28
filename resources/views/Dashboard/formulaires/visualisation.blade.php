@extends('template.master')
@section('title') Mobile @endsection

@section('main_section')

<div class="content-wrapper" class="">
  <div class="card" id="form_card" class="slide-in-right">
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
              <div onclick="InfoPOSFunctionShow_Question_By_Question()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%" style="margin-bottom: 0px !important;">                
                <i class="mdi mdi-store icon-style"></i>
                <br/>
                <br/>
                <span class="span-style">Info POS</span>
                <br/>
                <br/>
              </div>
            </td>  

            <td class="text-center" style="width: 50%">
              <div onclick="AchatsFunctionShow_Question_By_Question()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%" style="margin-bottom: 0px !important;">
                <i class="mdi mdi-cash icon-style"></i>
                <br/>
                <br/>
                <span class="span-style">Achats</span>
                <br/>
                <br/>
              </div>
            </td>  
          </tr>

          <tr>
            
            <td class="text-center" style="width: 50%">
              <div onclick="FrigosFunctionShow_Question_By_Question()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%" style="margin-bottom: 0px !important;">
                <i class="mdi mdi-fridge icon-style"></i>
                <br/>
                <br/>
                <span class="span-style">Frigos</span>
                <br/>
                <br/>
              </div>
            </td>  

            <td class="text-center">
              <div onclick="AuditFunctionShow_Question_By_Question()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%" style="margin-bottom: 0px !important;">
                <i class="mdi mdi-clipboard-check icon-style"></i>
                <br/>
                <br/>
                <span class="span-style">Audit</span>
                <br/>
                <br/>
              </div>
            </td>  
          </tr>
 
          <tr>
            <td class="text-center" style="width: 50%">
              <div onclick="PLVExterieursFunctionShow_Question_By_Question()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%" style="margin-bottom: 0px !important;">
                <i class="mdi mdi-fridge icon-style"></i>
                <br/>
                <br/>
                <span class="span-style">PLV</span>
                <br/>
                <span class="span-style">Exterieur</span>
              </div>
            </td>  

            <td class="text-center" style="width: 50%">
              <div onclick="PLVInterieursFunctionShow_Question_By_Question()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%" style="margin-bottom: 0px !important;">
                <i class="mdi mdi-clipboard-check icon-style"></i>
                <br/>
                <br/>
                <span class="span-style">PLV</span>
                <br/>
                <span class="span-style">Interieur</span>
              </div>
            </td>  
          </tr>

          <tr>
            <td class="text-center" style="width: 50%">
              <div onclick="ProduitsFunctionShow_Question_By_Question()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-food icon-style"></i>
                <br/>
                <br/>
                <span class="span-style">Photo</span> 
                <br/>
                <span class="span-style">Produits</span>
              </div>
            </td>  

            <td class="text-center" style="width: 50%">
              <div onclick="FacingsFunctionShow_Question_By_Question()" class="shadow-sm p-3 mb-5 bg-white rounded" height="90%" width="90%">
                <i class="mdi mdi-crosshairs-gps icon-style"></i>
                <br/>
                <br/>
                <span class="span-style">Facings</span>
                <br/>
                <br/>
              </div>
            </td>  
          </tr>
          
        </tbody>
      </table>

      <div id="formulaire_form">
        {!! form($form) !!}
        <br />
      </div>

    </div>
  </div>

</div>

@endsection

@include('Includes.MobileFormulaireVisualisation')
@include('Includes.Preformulaire')
