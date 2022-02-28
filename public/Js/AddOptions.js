
var i=1;

document.addEventListener("DOMContentLoaded", function(event) { 
    
    $('.dropdown-groupe-item').on('click', function(event) {
        var id_groupe           =   document.getElementById("id_groupe");
        id_groupe.innerHTML     =   event.target.innerHTML;   

        var id_groupe_value     =   document.getElementById("id_groupe_value");
        id_groupe_value.value   =   event.target.getAttribute("value");
    });

    $('.dropdown-type-groupe-item').on('click', function(event) {
        var id_type_question                =   document.getElementById("id_type_question");
        id_type_question.innerHTML          =   event.target.innerHTML;  
        
        var id_type_question_value          =   document.getElementById("id_type_question_value");
        id_type_question_value.value        =   event.target.getAttribute("value");

        if((id_type_question_value.value ==  3)||(id_type_question_value.value ==  4))
        {
            var selection_inputs_div            =   document.getElementById("selection_inputs_div")
            selection_inputs_div.hidden         =   false;
        }

        else
        {
            var selection_inputs_div            =   document.getElementById("selection_inputs_div");
            selection_inputs_div.hidden         =   true;

            selection_inputs_destroy();
        }
    });

    $('.dropdown-type-chart-groupe-item').on('click', function(event) {
        var id_type_chart                   =   document.getElementById("id_type_chart");
        id_type_chart.innerHTML             =   event.target.innerHTML;  
        
        var id_type_chart_value             =   document.getElementById("id_type_chart_value");
        id_type_chart_value.value           =   event.target.getAttribute("value");
    });
});

function selection_inputs_create()
{
    var selection_inputs_labels_div       =   document.getElementById("selection_inputs_labels_div")

    var label   =   document.createElement("label");
    label.setAttribute("for","option_"+i);
    label.innerHTML =   "Option "+i;
    selection_inputs_labels_div.appendChild(label);

    var br   =   document.createElement("br");
    selection_inputs_labels_div.appendChild(br);

    var input   =   document.createElement("input");
    input.id    =   "description_question";
    input.type  =   "text";
    input.name  =   "option_" + i;
    input.setAttribute('class',"form-control");
    selection_inputs_labels_div.appendChild(input);

    selection_inputs_labels_div.appendChild(br);

    // Append a line break 
    i   =   i+1;
    console.log(i);            
}

function selection_inputs_destroy()
{
    var selection_inputs_labels_div         =   document.getElementById("selection_inputs_labels_div"); 
    selection_inputs_labels_div.innerHTML   =   "";
    i  =   1; 
}
