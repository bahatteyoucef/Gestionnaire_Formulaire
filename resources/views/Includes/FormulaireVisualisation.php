<script type="text/javascript">

    var i   =   1;
    var j   =   1;
    var k   =   1;
    var l   =   1;
    var m   =   1;

    document.addEventListener("DOMContentLoaded", function(event) { 
        addGroupeNameAndButtons()
        addBreakBeforeFiles()
        RemoveHiddenTypes()
        HideModelFrigo()
        ToggleModelFrigo()
        AchatPourChaqueMarque()
    })

    function addGroupeNameAndButtons()
    {
        var groupes     =   document.querySelectorAll('[id^="groupe___"]');
        groupes.forEach(groupe => {

            const elem      =   document.createElement('h4');
            const elem_hr   =   document.createElement('hr');
            const elem_br   =   document.createElement('br');

            // add text
            elem.innerText = groupe.value;

            // insert the element before target element
            groupe.parentNode.insertBefore(elem_br, groupe);
            groupe.parentNode.insertBefore(elem, groupe);

            PLV_Interieur_Button(elem,groupe)
            PLV_Exterieur_Button(elem,groupe)
            Facing_Button(elem,groupe)
            Frigo_Button(elem,groupe)
            // Achat_Button(elem,groupe)

            groupe.parentNode.insertBefore(elem_hr, groupe);   
        });
    }

    function addBreakBeforeFiles()
    {
        var files   =   document.getElementsByClassName("file-upload-browse")
        
        Array.from(files).forEach((element) => {
            const elem_br   =   document.createElement('br');
            element.parentNode.insertBefore(elem_br, element);
        });
    }

    function Frigo()
    {
        var frigo_inputs                =   document.getElementsByClassName("groupe_23")
        
        var break_line_1                =   document.createElement('hr')
        var block_nv_frigo              =   document.createElement('div')
        var break_space_1               =   document.createElement('br')
        var break_line_2                =   document.createElement('hr')
        var header_frigo                =   document.createElement('h4')

        header_frigo.innerHTML          =   "Ajouter un nouveau frigo"
        block_nv_frigo.id               =   "frigo_"+m

        block_nv_frigo.appendChild(break_space_1)
        block_nv_frigo.appendChild(break_line_1)
        block_nv_frigo.appendChild(header_frigo)
        block_nv_frigo.appendChild(break_line_2)

        Array.from(frigo_inputs).forEach((element) => {
            
            var div_block_nv_frigo          =   document.createElement("div")
            div_block_nv_frigo.className    =   element.parentElement.className
            
            var  label_new                  =   document.createElement("label");
            label_new.className             =   "control-label"
            label_new.setAttribute("for", element.name  +   "_" +   m)

            var  break_space_2          =   document.createElement("br");

            var  input_new              =   document.createElement(element.tagName);
            input_new.className         =   element.className
            input_new.classList.remove("groupe_23");

            input_new.name              =   element.name        +   "_" +   m
            input_new.id                =   element.id          +   "_" +   m
            
            if(element.tagName  ==  "INPUT")
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.previousSibling.innerHTML
                input_new.type              =   "file"

                div_block_nv_frigo.appendChild(label_new)
                div_block_nv_frigo.appendChild(break_space_2)
                div_block_nv_frigo.appendChild(input_new)
            }

            else
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.innerHTML         =   element.innerHTML

                div_block_nv_frigo.appendChild(label_new)
                div_block_nv_frigo.appendChild(input_new)
            }

            block_nv_frigo.appendChild(div_block_nv_frigo)
        });

        var element_insert              =   document.getElementById("Photo_du_frigo")
        element_insert.parentNode.parentNode.insertBefore(block_nv_frigo,element_insert.parentNode.nextSibling)

        var elm     =   GetElementInsideContainer("frigo_"+m, "Disponibilit??_Frigo_"+m)
        console.log(elm)
        
        elm.value   =   1;

        GriserSelect("Disponibilit??_Frigo_"+m)

        m   =   m+1;
    }

    function Frigo_minus()
    {
        var frigo_input                =   document.getElementById("Photo_du_frigo")
        
        if(frigo_input.parentElement.nextElementSibling.nodeName != "BR")
        {
            frigo_input.parentElement.nextElementSibling.remove()
            m   =   m-1
        }
    }

    function Frigo_Button(elem,groupe)
    {
        if(elem.innerText   ==  "Disponibilit?? Frigo")
        {
            elem.style                      =   "display:inline-block;";
            const button_frigo_minus        =   document.createElement('input');
            button_frigo_minus.type         =   "button"
            button_frigo_minus.value        =   "-"
            
            button_frigo_minus.addEventListener("click", Frigo_minus);
            
            button_frigo_minus.style        =   "margin-left:20px;"
            button_frigo_minus.className    =   "btn btn-warning me-2"

            groupe.parentNode.insertBefore(button_frigo_minus, groupe);
        }

        if(elem.innerText   ==  "Disponibilit?? Frigo")
        {
            elem.style              =   "display:inline-block;";
            const button_frigo      =   document.createElement('input');
            button_frigo.type       =   "button"
            button_frigo.value      =   "+"
            
            button_frigo.addEventListener("click", Frigo);
            
            button_frigo.style      =   "margin-left:5px;"
            button_frigo.className  =   "btn btn-primary me-2"

            groupe.parentNode.insertBefore(button_frigo, groupe);
        }
    }

    function HideModelFrigo()
    {
        var Model_frigo     =   document.getElementById("Disponibilit??_Frigo")

        Model_frigo.parentElement.nextSibling.nextSibling.style                         =   "display:none"
        Model_frigo.parentElement.nextSibling.nextSibling.nextSibling.nextSibling.style =   "display:none"
    }

    function ToggleModelFrigo(event)
    {
        var Model_frigo     =   document.getElementById("Disponibilit??_Frigo")

        Model_frigo.addEventListener("change", function(event) { 

            if(event.target.value   ==  1)
            {
                Model_frigo.parentElement.nextSibling.nextSibling.style                         =   "display:block"
                Model_frigo.parentElement.nextSibling.nextSibling.nextSibling.nextSibling.style =   "display:block"
            }
            else
            {
                Model_frigo.parentElement.nextSibling.nextSibling.style                         =   "display:none"
                Model_frigo.parentElement.nextSibling.nextSibling.nextSibling.nextSibling.style =   "display:none"
            }
        })
    }

    function PLVInterior()
    {
        var PLV_int_inputs              =   document.getElementsByClassName("groupe_28")
        
        var break_line_1                =   document.createElement('hr')
        var block_nv_plv_int            =   document.createElement('div')
        var break_space_1               =   document.createElement('br')
        var break_line_2                =   document.createElement('hr')
        var header_plv_int              =   document.createElement('h4')

        header_plv_int.innerHTML        =   "Ajouter un nouveau PLV Interior"

        block_nv_plv_int.id             =   "block_nv_plv_int_" +   i

        block_nv_plv_int.appendChild(break_space_1)
        block_nv_plv_int.appendChild(break_line_1)
        block_nv_plv_int.appendChild(header_plv_int)
        block_nv_plv_int.appendChild(break_line_2)

        Array.from(PLV_int_inputs).forEach((element) => {
            
            var div_block_nv_plv_int        =   document.createElement("div")
            div_block_nv_plv_int.className  =   element.parentElement.className
            
            var  label_new              =   document.createElement("label");
            label_new.className         =   "control-label"
            label_new.setAttribute("for", element.name  +   "_" +   i)

            var  break_space_2          =   document.createElement("br");

            var  input_new              =   document.createElement(element.tagName);
            input_new.className         =   element.className
            input_new.classList.remove("groupe_28");

            input_new.name              =   element.name        +   "_" +   i
            input_new.id                =   element.id          +   "_" +   i
            
            if(element.tagName  ==  "INPUT")
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.previousSibling.innerHTML
                input_new.type              =   "file"

                div_block_nv_plv_int.appendChild(label_new)
                div_block_nv_plv_int.appendChild(break_space_2)
                div_block_nv_plv_int.appendChild(input_new)
            }

            else
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.innerHTML         =   element.innerHTML

                div_block_nv_plv_int.appendChild(label_new)
                div_block_nv_plv_int.appendChild(input_new)
            }

            block_nv_plv_int.appendChild(div_block_nv_plv_int)
        });

        var element_insert              =   document.getElementById("Marque_sur_la_PLV_Interieur")
        element_insert.parentNode.parentNode.insertBefore(block_nv_plv_int,element_insert.parentNode.nextSibling)

        i   =   i+1;

    }

    function PLV_Interieur_minus()
    {
        var frigo_input                =   document.getElementById("info_sur_PLV_(photo)")
        
        if(frigo_input.parentElement.nextElementSibling.nodeName != "BR")
        {
            frigo_input.parentElement.nextElementSibling.remove()
            i   =   i-1
        }
    }

    function PLV_Interieur_Button(elem,groupe)
    {
        if(elem.innerText   ==  "PLV interieur")
        {
            elem.style                      =   "display:inline-block;";
            const button_plv_int_minus      =   document.createElement('input');
            button_plv_int_minus.type       =   "button"
            button_plv_int_minus.value      =   "-"
            
            button_plv_int_minus.addEventListener("click", PLV_Interieur_minus);
            
            button_plv_int_minus.style      =   "margin-left:20px;"
            button_plv_int_minus.className  =   "btn btn-warning me-2"

            groupe.parentNode.insertBefore(button_plv_int_minus, groupe);
        }

        if(elem.innerText   ==  "PLV interieur")
        {
            elem.style              =   "display:inline-block;";
            const button_plv_int    =   document.createElement('input');
            button_plv_int.type     =   "button"
            button_plv_int.value    =   "+"
            
            button_plv_int.addEventListener("click", PLVInterior);
            
            button_plv_int.style    =   "margin-left:5px;"
            button_plv_int.className=   "btn btn-primary me-2"

            groupe.parentNode.insertBefore(button_plv_int, groupe);
        }
    }

    function PLVExterieur()
    {
        var PLV_int_inputs              =   document.getElementsByClassName("groupe_29")
        
        var break_line_1                =   document.createElement('hr')
        var block_nv_plv_int            =   document.createElement('div')
        var break_space_1               =   document.createElement('br')
        var break_line_2                =   document.createElement('hr')
        var header_plv_int              =   document.createElement('h4')

        header_plv_int.innerHTML        =   "Ajouter un nouveau PLV Exterieur"

        block_nv_plv_int.id             =   "block_nv_plv_int_"+j

        block_nv_plv_int.appendChild(break_space_1)
        block_nv_plv_int.appendChild(break_line_1)
        block_nv_plv_int.appendChild(header_plv_int)
        block_nv_plv_int.appendChild(break_line_2)

        Array.from(PLV_int_inputs).forEach((element) => {

            var div_block_nv_plv_int        =   document.createElement("div")
            div_block_nv_plv_int.className  =   element.parentElement.className
            
            var  label_new              =   document.createElement("label");
            label_new.className         =   "control-label"
            label_new.setAttribute("for", element.name  +   "_" +   j)

            var  break_space_2          =   document.createElement("br");

            var  input_new              =   document.createElement(element.tagName);
            input_new.className         =   element.className
            input_new.classList.remove("groupe_29");

            input_new.name              =   element.name        +   "_" +   j
            input_new.id                =   element.id          +   "_" +   j
            
            if(element.tagName  ==  "INPUT")
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.previousSibling.innerHTML
                input_new.type              =   "file"

                div_block_nv_plv_int.appendChild(label_new)
                div_block_nv_plv_int.appendChild(break_space_2)
                div_block_nv_plv_int.appendChild(input_new)
            }

            else
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.innerHTML         =   element.innerHTML

                div_block_nv_plv_int.appendChild(label_new)
                div_block_nv_plv_int.appendChild(input_new)
            }

            block_nv_plv_int.appendChild(div_block_nv_plv_int)
        });

        var element_insert              =   document.getElementById("Marque_sur_la_PLV_Exterieur")
        element_insert.parentNode.parentNode.insertBefore(block_nv_plv_int,element_insert.parentNode.nextSibling)

        j   =   j+1;

    }

    function PLVExterieur_minus()
    {
        var frigo_input                =   document.getElementById("Marque_sur_la_PLV_Exterieur")
        
        if(frigo_input.parentElement.nextElementSibling.nodeName != "BR")
        {
            frigo_input.parentElement.nextElementSibling.remove()
            j   =   j-1
        }
    }

    function PLV_Exterieur_Button(elem,groupe)
    {
        if(elem.innerText   ==  "PLV exterieur")
        {
            elem.style                      =   "display:inline-block;";
            const button_plv_ext_minus      =   document.createElement('input');
            button_plv_ext_minus.type       =   "button"
            button_plv_ext_minus.value      =   "-"
            
            button_plv_ext_minus.addEventListener("click", PLVExterieur_minus);
            
            button_plv_ext_minus.style      =   "margin-left:20px;"
            button_plv_ext_minus.className  =   "btn btn-warning me-2"

            groupe.parentNode.insertBefore(button_plv_ext_minus, groupe);
        }

        if(elem.innerText   ==  "PLV exterieur")
        {
            elem.style              =   "display:inline-block;";
            const button_plv_ext    =   document.createElement('input');
            button_plv_ext.type     =   "button"
            button_plv_ext.value    =   "+"
            
            button_plv_ext.addEventListener("click", PLVExterieur);
            
            button_plv_ext.style    =   "margin-left:5px;"
            button_plv_ext.className=   "btn btn-primary me-2"

            groupe.parentNode.insertBefore(button_plv_ext, groupe);
        }
    }

    function Facing()
    {
        var Facing_inputs               =   document.getElementsByClassName("groupe_31")
        
        var break_line_1                =   document.createElement('hr')
        var block_facing                =   document.createElement('div')
        var break_space_1               =   document.createElement('br')
        var break_line_2                =   document.createElement('hr')
        var header_facing               =   document.createElement('h4')

        header_facing.innerHTML         =   "Ajouter un nouveau Produit (Facing)"

        block_facing.id                 =   "facing_"+l

        block_facing.appendChild(break_space_1)
        block_facing.appendChild(break_line_1)
        block_facing.appendChild(header_facing)
        block_facing.appendChild(break_line_2)

        Array.from(Facing_inputs).forEach((element) => {
            var div_block_facing        =   document.createElement("div")
            div_block_facing.className  =   element.parentElement.className
            
            var  label_new              =   document.createElement("label");
            label_new.className         =   "control-label"
            label_new.setAttribute("for", element.name  +   "_" +   l)

            var  break_space_2          =   document.createElement("br");

            var  input_new              =   document.createElement(element.tagName);
            input_new.className         =   element.className
            input_new.classList.remove("groupe_31");

            input_new.name              =   element.name        +   "_" +   l
            input_new.id                =   element.id          +   "_" +   l

            if(element.tagName  ==  "INPUT")
            {
                if(element.getAttribute("type")  ==  "text")
                {
                    label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                    input_new.type              =   "text"

                    div_block_facing.appendChild(label_new)
                    div_block_facing.appendChild(break_space_2)
                    div_block_facing.appendChild(input_new)
                }

                else
                {
                    label_new.innerHTML         =   element.previousSibling.previousSibling.previousSibling.innerHTML
                    input_new.type              =   "file"

                    div_block_facing.appendChild(label_new)
                    div_block_facing.appendChild(break_space_2)
                    div_block_facing.appendChild(input_new)
                }
            }

            else
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.innerHTML         =   element.innerHTML

                div_block_facing.appendChild(label_new)
                div_block_facing.appendChild(input_new)
            }

            block_facing.appendChild(div_block_facing)
        });

        var element_insert              =   document.getElementById("Photo_facing")
        element_insert.parentNode.parentNode.insertBefore(block_facing,element_insert.parentNode.nextSibling)

        l   =   l+1;
    }

    function Facing_minus()
    {
        var facing_input                =   document.getElementById("Photo_facing")
        
        if(facing_input.parentElement.nextElementSibling.nodeName != "BR")
        {
            facing_input.parentElement.nextElementSibling.remove()
            l   =   l-1
        }
    }

    function Facing_Button(elem,groupe)
    {
        if(elem.innerText   ==  "Disponibilit?? de produit / Facing / prix")
        {
            elem.style                  =   "display:inline-block;";
            const facing_button_minus    =   document.createElement('input');
            facing_button_minus.type     =   "button"
            facing_button_minus.value    =   "-"
            
            facing_button_minus.addEventListener("click", Facing_minus);
            
            facing_button_minus.style    =   "margin-left:20px;"
            facing_button_minus.className=   "btn btn-warning me-2"

            groupe.parentNode.insertBefore(facing_button_minus, groupe);
        }

        if(elem.innerText   ==  "Disponibilit?? de produit / Facing / prix")
        {
            elem.style              =   "display:inline-block;";
            const facing_button     =   document.createElement('input');
            facing_button.type      =   "button"
            facing_button.value     =   "+"
            
            facing_button.addEventListener("click", Facing);
            
            facing_button.style     =   "margin-left:5px;"
            facing_button.className =   "btn btn-primary me-2"

            groupe.parentNode.insertBefore(facing_button, groupe);
        }
    }

    function AchatPourChaqueMarque()
    {
        Array.from(document.getElementById("Marque_de_produit_(Achat)").options).forEach(function(option_element) {
            if(option_element.value !=  1)
            {
                Achat(option_element.value)
            }
        });
    }

    function Achat(option_value)
    {
        var Achat_inputs                =   document.getElementsByClassName("groupe_33")
        
        var break_line_1                =   document.createElement('hr')
        var block_achat                 =   document.createElement('div')
        var break_space_1               =   document.createElement('br')
        var break_line_2                =   document.createElement('hr')
        var header_achat                =   document.createElement('h4')

        header_achat.innerHTML          =   "Ajouter un nouveau Produit (Achat)"

        block_achat.id                  =   "achat_"+k

        block_achat.appendChild(break_space_1)
        block_achat.appendChild(break_line_1)
        block_achat.appendChild(header_achat)
        block_achat.appendChild(break_line_2)

        Array.from(Achat_inputs).forEach((element) => {
            var div_block_achat         =   document.createElement("div")
            div_block_achat.className   =   element.parentElement.className
            
            var  label_new              =   document.createElement("label");
            label_new.className         =   "control-label"
            label_new.setAttribute("for", element.name  +   "_" +   k)

            var  break_space_2          =   document.createElement("br");

            var  input_new              =   document.createElement(element.tagName);
            input_new.className         =   element.className
            input_new.classList.remove("groupe_33");

            input_new.name              =   element.name        +   "_" +   k
            input_new.id                =   element.id          +   "_" +   k

            if(element.tagName  ==  "INPUT")
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.type              =   "text"

                div_block_achat.appendChild(label_new)
                div_block_achat.appendChild(break_space_2)
                div_block_achat.appendChild(input_new)
            }

            else
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.innerHTML         =   element.innerHTML

                div_block_achat.appendChild(label_new)
                div_block_achat.appendChild(input_new)
            }

            block_achat.appendChild(div_block_achat)
        });

        var element_insert              =   document.getElementById("Qte_vendu_par_Jour")
        element_insert.parentNode.parentNode.insertBefore(block_achat,element_insert.parentNode.nextSibling)

        var elm = GetElementInsideContainer("achat_"+k, "Marque_de_produit_(Achat)_"+k)
        elm.value=option_value;

        GriserSelect("Marque_de_produit_(Achat)_"+k)

        k   =   k+1;
    }

    function RemoveHiddenTypes()
    {
        var groupes     =   document.querySelectorAll('[id^="groupe___"]');
        groupes.forEach(groupe => {
            groupe.remove()
        })
    }

    /*        
        function Achat_minus()
        {
            var achat_input                =   document.getElementById("Qte_vendu_par_Jour")
            
            if(achat_input.parentElement.nextElementSibling.nodeName != "BR")
            {
                achat_input.parentElement.nextElementSibling.remove()
                k   =   k-1
            }
        }

        function Achat_Button(elem,groupe)
        {
            if(elem.innerText   ==  "Achat")
            {
                elem.style                  =   "display:inline-block;";
                const button_achat_minus    =   document.createElement('input');
                button_achat_minus.type     =   "button"
                button_achat_minus.value    =   "-"
                
                button_achat_minus.addEventListener("click", Achat_minus);
                
                button_achat_minus.style    =   "margin-left:20px;"
                button_achat_minus.className=   "btn btn-warning me-2"

                groupe.parentNode.insertBefore(button_achat_minus, groupe);
            }

            if(elem.innerText   ==  "Achat")
            {
                elem.style              =   "display:inline-block;";
                const button_achat      =   document.createElement('input');
                button_achat.type       =   "button"
                button_achat.value      =   "+"
                
                button_achat.addEventListener("click", Achat);
                
                button_achat.style      =   "margin-left:5px;"
                button_achat.className  =   "btn btn-primary me-2"

                groupe.parentNode.insertBefore(button_achat, groupe);
            }
        }
    */

    function GriserSelect(select)
    {
        var selectMarque    =   document.getElementById(select);
        selectMarque.setAttribute("disabled", "disabled");
    }
        
    function GetElementInsideContainer(containerID, childID) {
        var elm = {};
        var elms = document.getElementById(containerID).getElementsByTagName("*");
        for (var i = 0; i < elms.length; i++) {
            if (elms[i].id === childID) {
                elm = elms[i];
                break;
            }
        }

        return elm;
    }

</script>