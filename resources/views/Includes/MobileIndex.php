<?php use App\Models\Evaluation; ?>

<script type="text/javascript">

    var actualites_div;
    var formulaires_div;
    var evaluations_div;

    // Mobile Functions 
    document.addEventListener("DOMContentLoaded", function(event) {
        initialisation()
        showQuestionnaires()
    })

    function showActualites() {
        changeActiveLink("menu_horizontal_link_actualites")
        evaluations_div.style.setProperty("display", "none");
        formulaires_div.style.setProperty("display", "block");
    }

    function showQuestionnaires() {
        changeActiveLink("menu_horizontal_link_questionnaires")
        evaluations_div.style.setProperty("display", "none");
        formulaires_div.style.setProperty("display", "block");
    }

    function showEvaluations() {
        changeActiveLink("menu_horizontal_link_evaluations")
        formulaires_div.style.setProperty("display", "none");
        evaluations_div.style.setProperty("display", "block");
    }

    //Evaluation
    function validateEvaluation() {
        let str_1                   =   document.getElementById("add_evaluation").href
        let str_2                   =   str_1.replace('id_evaluation'   ,<?php echo $evaluation->id_evaluation ?>);
        let add_evaluation_link     =   str_2.replace('valeur'          ,event.target.value);

        window.location             =   add_evaluation_link
    }

    function passerEvaluation() {
        
        let evaluations_div                     =   document.getElementById("evaluations_div") 
        let evaluation_informations_card        =   document.getElementById("evaluation_informations_card")

        evaluation_informations_card_new        =   evaluation_informations_card.cloneNode(true)
        evaluation_informations_card.remove()

        evaluations_div.appendChild(evaluation_informations_card_new)

        <?php $evaluation                       =   Evaluation::inRandomOrder()->first();?>
    }

    //

    //

    //

    //

    //

    //

    //

    //Helpers

    //

    //

    //

    //

    //

    //

    //

    function initialisation() {
        formulaires_div             =   document.getElementById("formulaires_div");
        evaluations_div             =   document.getElementById("evaluations_div");
    }

    function changeActiveLink(next_active_link_name) {
        let next_active_link = document.getElementById(next_active_link_name)
        let previous_active_link = document.getElementsByClassName("menu_horizontal_link_active")[0]

        previous_active_link.classList.remove("menu_horizontal_link_active")
        next_active_link.classList.add("menu_horizontal_link_active")
    }

    function appendToMobileHeaderDiv() {
        let mobile_header_div = document.getElementById("mobile_header_div")
        mobile_header_div.appendChild()
    }

</script>