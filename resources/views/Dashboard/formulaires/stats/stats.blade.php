@extends('template.master')
@section('title') Mobile @endsection

@section('main_section')

<?php $i    =   0?>
<?php $j    =   0?>

<div class="content-wrapper" class="">
  <div class="card" id="form_card" class="slide-in-right" style="height:100% !important;">
    <div class="card-body">

      <table class="table table-borderless" id="mobile_divs">
        <thead>
          <tr>
            <th scope="col" style="width: 33%" class="text-center table-mobile-view"></th>
            <th scope="col" style="width: 33%" class="text-center table-mobile-view"></th>
            <th scope="col" style="width: 33%" class="text-center table-mobile-view"></th>
          </tr>
        </thead>
        
        <tbody>
            @foreach($questions as $question)
                <?php if($i ==  3) {echo "<tr>"     ;}   $i=$i+1;$j=$j+1       ?>
                
                <div>
                    <td class="text-center">
                        <span>{{$question->description_question}}</span>
                        <br/>

                        @include('Dashboard.formulaires.stats.stats_details')
                        
                    </td>
                </div>

                <?php if($i ==  3) {echo "</tr>"    ;   $i=0;       }   ?>
            @endforeach
        </tbody>
      </table>

    </div>
  </div>

</div>

@endsection

<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function(event) {
  for(let k=1;k<=<?php echo $j?>;k++)
  {
    ChartData(k)
  }
})

</script>