<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<canvas id="bar_chart_{{$j}}" width="15%"></canvas>

<script type="text/javascript">
  
  var data;
  var labels;
  var current_question

  function ChartData(k) 
  {
    let id_question;
    let title;

    id_question =   <?php echo $question->id_question;          ?>;
    title       = " <?php echo $question->description_question; ?>";

    var url = '{{route("get_stats", [":id_question"]) }}';
    var url = url.replace(':id_question', id_question);

    fetch(url, {
        method: 'GET',
      })

      .then(response => response.json())
      .then(nbrOuiNon => {
  
        new Chart(document.getElementById("bar_chart_"+k), {
          type: 'bar',
          data: {
            labels: ["Oui", "Non"],
            datasets: [{
              label: "Nomnbre de POS",
              backgroundColor: ["#3e95cd", "#8e5ea2"],
              data: [nbrOuiNon[0].TotaleOui, nbrOuiNon[0].TotaleNon]
            }]
          },
          options: {
            legend: {
              display: false
            },
            title: {
              display : true,
              text    : title 
            }
          }
        });

      });
  }

</script>