<script type="text/javascript">

        var MobileDivs

        var InfoPOS_18
        var InfoPOS_19
        var InfoPOS_20

        var Frigo_23  

        var Plv_int_28
        var Plv_ext_29

        var Facing_31 

        var Audit_22  
        var Audit_26  
        var Audit_30  
        var Audit_34  
        var Audit_35  
        var Audit_36  

        var Achat_33  

        var Produit_42

        var BackButton
        var SauvgarderButton

        var LastButton
        var NextButton

        var SubmitButton

        var last_question
        var current_question
        var next_question

        var last_header     =   null
        var current_header  =   null
        var next_header     =   null

        var frigos_number
        var plv_ext_number
        var plv_int_number
        var facings_number

        var next_achat_itiration        =   false
        var next_frigo_itiration        =   false
        var next_plv_ext_itiration      =   false
        var next_plv_int_itiration      =   false
        var next_facing_itiration       =   false

        var frigo_first_question        =   false
        var plv_ext_first_question      =   false
        var plv_int_first_question      =   false
        var facing_first_question       =   false

    // Mobile Functions 
    document.addEventListener("DOMContentLoaded", function(event) 
    { 
        Initialisation()
        HideAll()

        document.getElementById("back")         .addEventListener("click", BackFunction);
        document.getElementById("sauvgarder")   .addEventListener("click", SauvgarderFunction);
    })

    function InfoPOSFunctionShow_Question_By_Question()
    {
        MobileDivsHide()

        InfoPOS_18.style.display    =   "block"

        LastButton.innerHTML                                        =   "Precedent"
        NextButton.innerHTML                                        =   "Suivant"

        //Hide All Questions except first question
        HideElementsDansDiv("groupe_18_1")
        showFirstChild("groupe_18_1")

        RemoveEvents()
        AddInfoEvents()

        ShowNextButton()
        HideNextButton()

        ShowLastButton()
        HideLastButton()

        SubmitFunctionHide()
    }

    function AuditFunctionShow_Question_By_Question()
    {
        MobileDivsHide()

        Audit_22.style.display    =   "block"

        LastButton.innerHTML                                        =   "Precedent"
        NextButton.innerHTML                                        =   "Suivant"

        //Hide All Questions except first question
        HideElementsDansDiv("groupe_22_1")
        showFirstChild("groupe_22_1")

        RemoveEvents()
        AddAuditEvents()

        ShowNextButton()
        HideNextButton()

        ShowLastButton()
        HideLastButton()

        SubmitFunctionHide()
    }

    function AchatsFunctionShow_Question_By_Question()
    {
        MobileDivsHide()

        Achat_33.style.display    =   "block"

        LastButton.innerHTML                                        =   "Precedent"
        NextButton.innerHTML                                        =   "Suivant"

        //Hide All Questions except first question
        HideElementsDansDiv("groupe_33_1")
        showFirstChild("groupe_33_1")

        RemoveEvents()
        AddAchatEvents()

        ShowNextButton()
        HideNextButton()

        ShowLastButton()
        HideLastButton()

        SubmitFunctionHide()
    }

    function ProduitsFunctionShow_Question_By_Question()
    {
        MobileDivsHide()

        Produit_42.style.display    =   "block"

        LastButton.innerHTML                                        =   "Precedent"
        NextButton.innerHTML                                        =   "Suivant"

        //Hide All Questions except first question
        HideElementsDansDiv("groupe_42_1")
        showFirstChild("groupe_42_1")

        RemoveEvents()

        ShowNextButton()
        HideNextButton()

        ShowLastButton()
        HideLastButton()

        SubmitFunctionHide()
    }

    function FrigosFunctionShow_Question_By_Question()
    {
        MobileDivsHide()
        PageFrigoEvents()
    }
    
    function PLVExterieursFunctionShow_Question_By_Question()
    {
        MobileDivsHide()
        PagePLVExtEvents()
    }

    function PLVInterieursFunctionShow_Question_By_Question()
    {
        MobileDivsHide()
        PagePLVIntEvents()
    }

    function FacingsFunctionShow_Question_By_Question()
    {
        MobileDivsHide()
        PageFacingEvents()
    }

    //

    //

    //  Helpers

    //

    //

    function HideElementsDansDiv(containerID) 
    {
        //cas non achat
        if(containerID  !=  "groupe_33_1")
        {
            var elm = {};
            var elms = document.getElementById(containerID).getElementsByClassName("form-group");

            for (var i = 0; i < elms.length; i++) 
            {
                elms[i].style.display   =   "none";   
            }

            //Hide Header
            document.getElementById(containerID).firstChild.style.display                       =   "none";

            //Hide HR
            document.getElementById(containerID).firstChild.nextElementSibling.style.display    =   "none";
            document.getElementById(containerID).classList.remove("slide_form_right")
        }
        
        else
        {
            var elm = {};
            var elms = document.getElementById(containerID).childNodes;

            for (var i = 0; i < elms.length; i++) 
            {
                elms[i].style.display   =   "none";   
            }
        }
    }

    function HideAchatElementsDansDiv(containerID) 
    {
        var elm = {};
        var elms = document.getElementById(containerID).childNodes;

        for (var i = 0; i < elms.length; i++) 
        {
            elms[i].style.display   =   "none";   
        }
    }

    function HideFrigoElementsDansDiv(containerID) 
    {
        var elm = {};
        var elms = document.getElementById(containerID).childNodes;

        for (var i = 0; i < elms.length; i++) 
        {
            elms[i].style.display   =   "none";   
        }
    }

    function HidePLVExtElementsDansDiv(containerID) 
    {
        var elm = {};
        var elms = document.getElementById(containerID).childNodes;

        for (var i = 0; i < elms.length; i++) 
        {
            elms[i].style.display   =   "none";   
        }
    }

    function HidePLVIntElementsDansDiv(containerID) 
    {
        var elm = {};
        var elms = document.getElementById(containerID).childNodes;

        for (var i = 0; i < elms.length; i++) 
        {
            elms[i].style.display   =   "none";   
        }
    }

    function HideFacingElementsDansDiv(containerID) 
    {
        var elm = {};
        var elms = document.getElementById(containerID).childNodes;

        for (var i = 0; i < elms.length; i++) 
        {
            elms[i].style.display   =   "none";   
        }
    }

    //

    function showFirstChild(containerID)
    {
        //Remove 'current_class' from all questions
        let current_question_classes    =   document.getElementsByClassName("current_question")

        Array.prototype.forEach.call(current_question_classes, function(current_question_class) {
            current_question_class.classList.remove("current_question")
        });

        //Show Header
        document.getElementById(containerID).firstChild.style.display                       =   "block";
        document.getElementById(containerID).firstChild.classList.add("slide_form_right");

        //Show HR
        document.getElementById(containerID).firstChild.nextElementSibling.style.display    =   "block";
        document.getElementById(containerID).firstChild.nextElementSibling.classList.add("slide_form_right");

        //Show First Question
        var elm                 =   document.getElementById(containerID).getElementsByClassName("form-group")[0];
        
        elm.style.display       =   "block";

        elm.classList.add("current_question");
        elm.classList.add("slide_form_right");

        //Current Question
        current_question        =   elm
        current_header          =   document.getElementById(containerID).firstChild

        //Remove class from last header
        if(last_header  !=  null)
        {
            last_header.classList.remove("slide_form_right");
            last_header.classList.remove("slide_form_left");
        }

        frigo_first_question    =   false
        plv_int_first_question  =   false
        plv_ext_first_question  =   false  
        facing_first_question   =   false
    }

    function showLastChild(containerID)
    {
        //Show Header
        document.getElementById(containerID).firstChild.classList.add("slide_form_left");
        document.getElementById(containerID).firstChild.style.display                       =   "block";
        
        //Show HR
        document.getElementById(containerID).firstChild.nextElementSibling.classList.add("slide_form_left");
        document.getElementById(containerID).firstChild.nextElementSibling.style.display    =   "block";

        //Show First Question
        var elm                 =   document.getElementById(containerID).getElementsByClassName("form-group")[document.getElementById(containerID).getElementsByClassName("form-group").length-1];

        elm.style.display       =   "block";
        elm.classList.add("slide_form_right");
        elm.classList.add("slide_form_left");

        elm.classList.add("current_question");

        last_question           =   elm

        last_header             =   document.getElementById(containerID).firstChild
        next_header             =   current_header

        //Remove class from last header
        if(next_header  !=  null)
        {
            next_header.classList.remove("slide_form_right");
            next_header.classList.remove("slide_form_left");
        }
    }

    //

    function showFirstAchatChild(containerID)
    {
        //Remove 'current_class' from all questions
        let current_question_classes    =   document.getElementsByClassName("current_question")

        Array.prototype.forEach.call(current_question_classes, function(current_question_class) {
            current_question_class.classList.remove("current_question")
        });

        if(containerID  ==  "groupe_33_1")
        {
            //Show Header
            document.getElementById(containerID).firstChild.style.display                       =   "block";
            document.getElementById(containerID).firstChild.classList.add("slide_form_right");

            //Show HR
            document.getElementById(containerID).firstChild.nextElementSibling.style.display    =   "block";
            document.getElementById(containerID).firstChild.nextElementSibling.classList.add("slide_form_right");
        }

        if(current_question !=  null)
        {
            //Remove classlist
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
            current_question.classList.remove("current_question")
        }

        //Show First Question
        var elm                 =   document.getElementById(containerID).getElementsByClassName("form-group")[0];
        elm.style.display       =   "block";

        elm.classList.add("current_question");
        elm.classList.add("slide_form_right");

        //Current Question
        current_question        =   elm
        current_header          =   document.getElementById(containerID).firstChild

        //Remove class from last header
        if(last_header  !=  null)
        {
            last_header.classList.remove("slide_form_right");
            last_header.classList.remove("slide_form_left");
        }

        frigo_first_question    =   false
        plv_int_first_question  =   false
        plv_ext_first_question  =   false  
        facing_first_question   =   false
    }

    function showLastAchatChild(containerID)
    {
        if(containerID  ==  "groupe_33_1")
        { 
            //Show Last Question
            var elm                 =   document.getElementById("achat_1").previousElementSibling;

            elm.style.display       =   "block";
            
            elm.classList.add("slide_form_left");
            elm.classList.add("current_question");

            last_question           =   elm
        }

        else
        {
            //Show Last Question
            var elm                 =   document.getElementById(containerID).lastElementChild;

            elm.style.display       =   "block";

            elm.classList.add("slide_form_left");
            elm.classList.add("current_question");

            last_question           =   elm
        }
    }

    //

    function showFirstFrigoChild(containerID)
    {
        //Remove 'current_class' from all questions
        let current_question_classes    =   document.getElementsByClassName("current_question")

        Array.prototype.forEach.call(current_question_classes, function(current_question_class) {
            current_question_class.classList.remove("current_question")
        });

        if(containerID  ==  "groupe_23_1")
        {
            frigo_first_question    =   true

            //Show Header
            document.getElementById(containerID).firstChild.style.display                       =   "block";
            document.getElementById(containerID).firstChild.classList.add("slide_form_right");

            //Show HR
            document.getElementById(containerID).firstChild.nextElementSibling.style.display    =   "block";
            document.getElementById(containerID).firstChild.nextElementSibling.classList.add("slide_form_right");   
        }

        if(current_question !=  null)
        {
            //Remove classlist
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
            current_question.classList.remove("current_question")
        }

        //Show First Question
        var elm                 =   document.getElementById(containerID).getElementsByClassName("form-group")[0];
        elm.style.display       =   "block";

        elm.classList.add("current_question");
        elm.classList.add("slide_form_right");

        //Current Question
        current_question        =   elm
        current_header          =   document.getElementById(containerID).firstChild

        //Remove class from last header
        if(last_header  !=  null)
        {
            last_header.classList.remove("slide_form_right");
            last_header.classList.remove("slide_form_left");
        }

        frigo_first_question    =   false
        plv_int_first_question  =   false
        plv_ext_first_question  =   false  
        facing_first_question   =   false
    }

    function showLastFrigoChild(containerID)
    {
        if(containerID  ==  "groupe_23_1")
        { 
            //Show Last Question
            var elm                 =   document.getElementById("frigo_1").previousElementSibling;

            elm.style.display       =   "block";
            elm.classList.add("slide_form_left");

            elm.classList.add("current_question");

            last_question           =   elm
        }

        else
        {
            //Show Last Question
            var elm                 =   document.getElementById(containerID).lastElementChild;

            elm.style.display       =   "block";
            elm.classList.add("slide_form_left");

            elm.classList.add("current_question");

            last_question           =   elm
        }
    }

    //

    function showFirstPLVExtChild(containerID)
    {
        //Remove 'current_class' from all questions
        let current_question_classes    =   document.getElementsByClassName("current_question")

        Array.prototype.forEach.call(current_question_classes, function(current_question_class) {
            current_question_class.classList.remove("current_question")
        });

        if(containerID  ==  "groupe_29_1")
        {
            plv_ext_first_question    =   true

            //Show Header
            document.getElementById(containerID).firstChild.style.display                       =   "block";
            document.getElementById(containerID).firstChild.classList.add("slide_form_right");

            //Show HR
            document.getElementById(containerID).firstChild.nextElementSibling.nextElementSibling.nextElementSibling.style.display    =   "block";
            document.getElementById(containerID).firstChild.nextElementSibling.nextElementSibling.nextElementSibling.classList.add("slide_form_right");
        }

        if(current_question !=  null)
        {
            //Remove classlist
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
            current_question.classList.remove("current_question")
        }

        //Show First Question
        var elm                 =   document.getElementById(containerID).getElementsByClassName("form-group")[0];
        elm.style.display       =   "block";

        elm.classList.add("current_question");
        elm.classList.add("slide_form_right");

        //Current Question
        current_question        =   elm
        current_header          =   document.getElementById(containerID).firstChild

        //Remove class from last header
        if(last_header  !=  null)
        {
            last_header.classList.remove("slide_form_right");
            last_header.classList.remove("slide_form_left");
        }

        frigo_first_question    =   false
        plv_int_first_question  =   false
        plv_ext_first_question  =   false  
        facing_first_question   =   false
    }

    function showLastPLVExtChild(containerID)
    {
        if(containerID  ==  "groupe_29_1")
        { 
            //Show Last Question
            var elm                 =   document.getElementById("block_nv_plv_ext_1").previousElementSibling;

            elm.style.display       =   "block";
            elm.classList.add("slide_form_left");

            elm.classList.add("current_question");

            last_question           =   elm
        }

        else
        {
            //Show Last Question
            var elm                 =   document.getElementById(containerID).lastElementChild;

            elm.style.display       =   "block";
            elm.classList.add("slide_form_left");

            elm.classList.add("current_question");

            last_question           =   elm
        }
    }

    //

    function showFirstPLVIntChild(containerID)
    {
        //Remove 'current_class' from all questions
        let current_question_classes    =   document.getElementsByClassName("current_question")

        Array.prototype.forEach.call(current_question_classes, function(current_question_class) {
            current_question_class.classList.remove("current_question")
        });

        if(containerID  ==  "groupe_28_1")
        {
            plv_int_first_question    =   true

            //Show Header
            document.getElementById(containerID).firstChild.style.display                       =   "block";
            document.getElementById(containerID).firstChild.classList.add("slide_form_right");

            //Show HR
            document.getElementById(containerID).firstChild.nextElementSibling.nextElementSibling.nextElementSibling.style.display    =   "block";
            document.getElementById(containerID).firstChild.nextElementSibling.nextElementSibling.nextElementSibling.classList.add("slide_form_right");
        }

        if(current_question !=  null)
        {
            //Remove classlist
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
            current_question.classList.remove("current_question")
        }

        //Show First Question
        var elm                 =   document.getElementById(containerID).getElementsByClassName("form-group")[0];
        elm.style.display       =   "block";

        elm.classList.add("current_question");
        elm.classList.add("slide_form_right");

        //Current Question
        current_question        =   elm
        current_header          =   document.getElementById(containerID).firstChild

        //Remove class from last header
        if(last_header  !=  null)
        {
            last_header.classList.remove("slide_form_right");
            last_header.classList.remove("slide_form_left");
        }

        frigo_first_question    =   false
        plv_int_first_question  =   false
        plv_ext_first_question  =   false  
        facing_first_question   =   false
    }

    function showLastPLVIntChild(containerID)
    {
        if(containerID  ==  "groupe_28_1")
        { 
            //Show Last Question
            var elm                 =   document.getElementById("block_nv_plv_int_1").previousElementSibling;

            elm.style.display       =   "block";
            elm.classList.add("slide_form_left");

            elm.classList.add("current_question");

            last_question           =   elm
        }

        else
        {
            //Show Last Question
            var elm                 =   document.getElementById(containerID).lastElementChild;

            elm.style.display       =   "block";
            elm.classList.add("slide_form_left");

            elm.classList.add("current_question");

            last_question           =   elm
        }
    }

    //

    function showFirstFacingChild(containerID)
    {
        //Remove 'current_class' from all questions
        let current_question_classes    =   document.getElementsByClassName("current_question")

        Array.prototype.forEach.call(current_question_classes, function(current_question_class) {
            current_question_class.classList.remove("current_question")
        });

        if(containerID  ==  "groupe_31_1")
        {
            facing_first_question    =   true

            //Show Header
            document.getElementById(containerID).firstChild.style.display                       =   "block";
            document.getElementById(containerID).firstChild.classList.add("slide_form_right");

            //Show HR
            document.getElementById(containerID).firstChild.nextElementSibling.nextElementSibling.nextElementSibling.style.display    =   "block";
            document.getElementById(containerID).firstChild.nextElementSibling.nextElementSibling.nextElementSibling.classList.add("slide_form_right");
        }

        if(current_question !=  null)
        {
            //Remove classlist
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
            current_question.classList.remove("current_question")
        }
        
        //Show First Question
        var elm                 =   document.getElementById(containerID).getElementsByClassName("form-group")[0];
        elm.style.display       =   "block";

        elm.classList.add("current_question");
        elm.classList.add("slide_form_right");

        //Current Question
        current_question        =   elm
        current_header          =   document.getElementById(containerID).firstChild

        //Remove class from last header
        if(last_header  !=  null)
        {
            last_header.classList.remove("slide_form_right");
            last_header.classList.remove("slide_form_left");
        }

        frigo_first_question    =   false
        plv_int_first_question  =   false
        plv_ext_first_question  =   false  
        facing_first_question   =   false
    }

    function showLastFacingChild(containerID)
    {
        if(containerID  ==  "groupe_31_1")
        { 
            //Show Last Question
            var elm                 =   document.getElementById("facing_1").previousElementSibling;

            elm.style.display       =   "block";
            elm.classList.add("slide_form_left");

            elm.classList.add("current_question");

            last_question           =   elm
        }

        else
        {
            //Show Last Question
            var elm                 =   document.getElementById(containerID).lastElementChild;

            elm.style.display       =   "block";
            elm.classList.add("slide_form_left");

            elm.classList.add("current_question");

            last_question           =   elm
        }
    }

    //

    function GetNextElementDisplayed() 
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.nextElementSibling.tagName   !=  "BR")
        {
            next_question   =   current_question.nextElementSibling
            last_question   =   current_question
        }

        else
        {
            last_header                 =   current_question.parentElement.firstChild
            last_question               =   current_question

            current_question.parentElement.style.display                        =   "none"
            current_question.parentElement.nextElementSibling.style.display     =   "block"

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")

            HideElementsDansDiv(current_question.parentElement.id)
            HideElementsDansDiv(current_question.parentElement.nextElementSibling.id)
            showFirstChild(current_question.parentElement.nextElementSibling.id)

            next_question       =   current_question   
            current_question    =   last_question
        }
    }

    function GetNextAuditElementDisplayed() 
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.nextElementSibling.tagName   !=  "BR")
        {
            next_question   =   current_question.nextElementSibling
            last_question   =   current_question
        }

        else
        {
            last_header                 =   current_question.parentElement.firstChild
            last_question               =   current_question

            current_question.parentElement.style.display                        =   "none"
            
            if(current_question.parentElement.nextElementSibling.id ==  "groupe_23_1")
            {
                document.getElementById("groupe_26_1").style.display     =   "block"
                
                current_question.classList.remove("current_question")
                current_question.classList.remove("slide_form_right")
                current_question.classList.remove("slide_form_left")
                
                HideElementsDansDiv(current_question.parentElement.id)
                HideElementsDansDiv("groupe_26_1")
                showFirstChild("groupe_26_1")
            }

            else
            {
                if(current_question.parentElement.nextElementSibling.id ==  "groupe_42_1")
                {
                    document.getElementById("groupe_30_1").style.display     =   "block"
                    
                    current_question.classList.remove("current_question")
                    current_question.classList.remove("slide_form_right")
                    current_question.classList.remove("slide_form_left")
                    
                    HideElementsDansDiv(current_question.parentElement.id)
                    
                    HideElementsDansDiv("groupe_30_1")
                    showFirstChild("groupe_30_1")
                }

                else
                {
                    if(current_question.parentElement.nextElementSibling.id ==  "groupe_31_1")
                    {
                        document.getElementById("groupe_34_1").style.display     =   "block"
                        
                        current_question.classList.remove("current_question")
                        current_question.classList.remove("slide_form_right")
                        current_question.classList.remove("slide_form_left")
                        
                        HideElementsDansDiv(current_question.parentElement.id)
                        
                        HideElementsDansDiv("groupe_34_1")
                        showFirstChild("groupe_34_1")
                    }

                    else
                    {
                        last_header                 =   current_question.parentElement.firstChild
                        last_question               =   current_question

                        current_question.parentElement.style.display                        =   "none"
                        current_question.parentElement.nextElementSibling.style.display     =   "block"

                        current_question.classList.remove("current_question")
                        current_question.classList.remove("slide_form_right")
                        current_question.classList.remove("slide_form_left")

                        HideElementsDansDiv(current_question.parentElement.id)
                        HideElementsDansDiv(current_question.parentElement.nextElementSibling.id)
                        showFirstChild(current_question.parentElement.nextElementSibling.id)
                    }
                }
            }

            next_question       =   current_question   
            current_question    =   last_question
        }
    }

    function GetNextAchatElementDisplayed() 
    {
        var elm                         = {};
        var elm_current_in_new_achat    ;

        var elm = document.getElementsByClassName("current_question")[0];

        if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.id   !=  ""))
        {        
            current_question.style.display                          =   "none"
            current_question.nextElementSibling.style.display       =   "block"

            HideAchatElementsDansDiv(current_question.nextElementSibling.id)
            showFirstAchatChild(current_question.nextElementSibling.id)

            next_achat_itiration                =   false
        }

        else
        {
            if((current_question.parentElement.id.indexOf("achat_") !== -1)&&(current_question.lastElementChild.id.indexOf("Marque_de_produit_(Achat)_") !== -1)&&(current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
            {
                next_achat_itiration                =   true
                next_question                       =   current_question.nextElementSibling
            }

            else
            {
                if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
                {
                    next_question   =   current_question.nextElementSibling
                    last_question   =   current_question
                }

                if(current_question.nextElementSibling  ==  null)
                {
                    current_question.parentElement.style.display                          =   "none"
                    current_question.parentElement.nextElementSibling.style.display       =   "block"

                    HideAchatElementsDansDiv(current_question.parentElement.id)
                    HideAchatElementsDansDiv(current_question.parentElement.nextElementSibling.id)

                    showFirstAchatChild(current_question.parentElement.nextElementSibling.id)

                    next_achat_itiration                =   false
                }
            }
        }
    }

    function GetNextFrigoElementDisplayed() 
    {
        var elm                         = {};
        var elm_current_in_new_achat    ;

        var elm = document.getElementsByClassName("current_question")[0];

        if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.id   !=  ""))
        {        
            current_question.style.display                          =   "none"
            current_question.nextElementSibling.style.display       =   "block"

            HideFrigoElementsDansDiv(current_question.nextElementSibling.id)
            showFirstFrigoChild(current_question.nextElementSibling.id)

            next_frigo_itiration                =   false
        }

        else
        {
            if((current_question.parentElement.id.indexOf("frigo_") !== -1)&&(current_question.lastElementChild.id.indexOf("Disponibilité_Frigo_") !== -1)&&(current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
            {
                next_frigo_itiration                =   true
                next_question                       =   current_question.nextElementSibling
            }

            else
            {
                if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
                {
                    next_question   =   current_question.nextElementSibling
                    last_question   =   current_question
                }

                if(current_question.nextElementSibling  ==  null)
                {
                    current_question.parentElement.style.display                          =   "none"
                    current_question.parentElement.nextElementSibling.style.display       =   "block"

                    HideFrigoElementsDansDiv(current_question.parentElement.id)
                    HideFrigoElementsDansDiv(current_question.parentElement.nextElementSibling.id)

                    showFirstFrigoChild(current_question.parentElement.nextElementSibling.id)

                    next_frigo_itiration                =   false
                }
            }
        }
    }

    function GetNextPLVExtElementDisplayed() 
    {
        var elm                         = {};
        var elm_current_in_new_achat    ;

        var elm = document.getElementsByClassName("current_question")[0];

        if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.id   !=  ""))
        {        
            current_question.style.display                          =   "none"
            current_question.nextElementSibling.style.display       =   "block"

            HidePLVExtElementsDansDiv(current_question.nextElementSibling.id)
            showFirstPLVExtChild(current_question.nextElementSibling.id)

            next_plv_ext_itiration                  =   false
        }

        else
        {
            if((current_question.parentElement.id.indexOf("block_nv_plv_ext_") !== -1)&&(current_question.lastElementChild.id.indexOf("Photo_PLV_exterieur_") !== -1)&&(current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
            {
                next_plv_ext_itiration              =   true
                next_question                       =   current_question.nextElementSibling
            }

            else
            {
                if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
                {
                    next_question   =   current_question.nextElementSibling
                    last_question   =   current_question
                }

                if(current_question.nextElementSibling  ==  null)
                {
                    current_question.parentElement.style.display                          =   "none"
                    current_question.parentElement.nextElementSibling.style.display       =   "block"

                    HidePLVExtElementsDansDiv(current_question.parentElement.id)
                    HidePLVExtElementsDansDiv(current_question.parentElement.nextElementSibling.id)

                    showFirstPLVExtChild(current_question.parentElement.nextElementSibling.id)

                    next_plv_ext_itiration                =   false
                }
            }
        }
    }

    function GetNextPLVIntElementDisplayed() 
    {
        var elm                         = {};
        var elm_current_in_new_achat    ;

        var elm = document.getElementsByClassName("current_question")[0];

        if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.id   !=  ""))
        {        
            current_question.style.display                          =   "none"
            current_question.nextElementSibling.style.display       =   "block"

            HidePLVIntElementsDansDiv(current_question.nextElementSibling.id)
            showFirstPLVIntChild(current_question.nextElementSibling.id)

            next_plv_int_itiration                  =   false
        }

        else
        {
            if((current_question.parentElement.id.indexOf("block_nv_plv_int_") !== -1)&&(current_question.lastElementChild.id.indexOf("Photo_PLV_interieur_") !== -1)&&(current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
            {
                next_plv_int_itiration              =   true
                next_question                       =   current_question.nextElementSibling
            }

            else
            {
                if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
                {
                    next_question   =   current_question.nextElementSibling
                    last_question   =   current_question
                }

                if(current_question.nextElementSibling  ==  null)
                {
                    current_question.parentElement.style.display                          =   "none"
                    current_question.parentElement.nextElementSibling.style.display       =   "block"

                    HidePLVIntElementsDansDiv(current_question.parentElement.id)
                    HidePLVIntElementsDansDiv(current_question.parentElement.nextElementSibling.id)

                    showFirstPLVIntChild(current_question.parentElement.nextElementSibling.id)

                    next_plv_int_itiration                =   false
                }
            }
        }
    }

    function GetNextFacingElementDisplayed() 
    {
        var elm                         = {};
        var elm_current_in_new_achat    ;

        var elm = document.getElementsByClassName("current_question")[0];

        if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.id   !=  ""))
        {        
            current_question.style.display                          =   "none"
            current_question.nextElementSibling.style.display       =   "block"

            HideFacingElementsDansDiv(current_question.nextElementSibling.id)
            showFirstFacingChild(current_question.nextElementSibling.id)

            next_facing_itiration                   =   false
        }

        else
        {
            if((current_question.parentElement.id.indexOf("facing_") !== -1)&&(current_question.lastElementChild.id.indexOf("Marque_de_produit_(Facing)") !== -1)&&(current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
            {
                next_facing_itiration               =   true
                next_question                       =   current_question.nextElementSibling
            }

            else
            {
                if((current_question.nextElementSibling  !=  null)&&(current_question.nextElementSibling.tagName   !=  "BR"))
                {
                    next_question   =   current_question.nextElementSibling
                    last_question   =   current_question
                }

                if(current_question.nextElementSibling  ==  null)
                {
                    current_question.parentElement.style.display                          =   "none"
                    current_question.parentElement.nextElementSibling.style.display       =   "block"

                    HideFacingElementsDansDiv(current_question.parentElement.id)
                    HideFacingElementsDansDiv(current_question.parentElement.nextElementSibling.id)

                    showFirstFacingChild(current_question.parentElement.nextElementSibling.id)

                    next_facing_itiration                =   false
                }
            }
        }
    }

    //

    function NextFunction()
    {
        GetNextElementDisplayed()
        current_question.style.display      =   "none"

        next_question.parentElement.classList.remove("slide_form_right")
        next_question.parentElement.classList.remove("slide_form_left")

        current_question.classList.remove("current_question")
        current_question.classList.remove("slide_form_right")
        current_question.classList.remove("slide_form_left")

        next_question.style.display         =   "block"
        next_question.classList.add("current_question")
        next_question.classList.add("slide_form_right")

        current_question                    =   next_question  

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function NextAchatFunction()
    {
        GetNextAchatElementDisplayed()

        let div_type    =   "Marque_de_produit_(Achat)_"

        if((current_question.parentElement.id   !=  "groupe_33_1")&&(current_question.lastElementChild.name.indexOf(div_type) !== -1)&&(next_achat_itiration==false))
        {
            last_question                       =   last_question.nextElementSibling
            next_question                       =   current_question
            next_achat_itiration                =   true
        }

        else
        {
            current_question.style.display      =   "none"
            
            next_question.parentElement.classList.remove("slide_form_right")
            next_question.parentElement.classList.remove("slide_form_left")

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")

            next_question.style.display         =   "block"
            next_question.classList.add("current_question")
            next_question.classList.add("slide_form_right")

            current_question                    =   current_question.nextElementSibling
        }

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function NextAuditFunction()
    {
        GetNextAuditElementDisplayed()
        current_question.style.display      =   "none"

        next_question.parentElement.classList.remove("slide_form_right")
        next_question.parentElement.classList.remove("slide_form_left")

        current_question.classList.remove("current_question")
        current_question.classList.remove("slide_form_right")
        current_question.classList.remove("slide_form_left")

        next_question.style.display         =   "block"
        next_question.classList.add("current_question")
        next_question.classList.add("slide_form_right")

        current_question                    =   next_question  

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function NextFrigoFunction()
    {
        GetNextFrigoElementDisplayed()

        let div_type    =   "Disponibilité_Frigo_"

        if((current_question.parentElement.id   !=  "groupe_23_1")&&(current_question.lastElementChild.name.indexOf(div_type) !== -1)&&(next_frigo_itiration==false))
        {
            last_question                       =   last_question.nextElementSibling
            next_question                       =   current_question
            next_frigo_itiration                =   true
        }

        else
        {
            current_question.style.display      =   "none"
            
            next_question.parentElement.classList.remove("slide_form_right")
            next_question.parentElement.classList.remove("slide_form_left")

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")

            next_question.style.display         =   "block"
            next_question.classList.add("current_question")
            next_question.classList.add("slide_form_right")

            current_question                    =   current_question.nextElementSibling
        }

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function NextPLVExtFunction()
    {
        GetNextPLVExtElementDisplayed()

        let div_type    =   "Photo_PLV_exterieur_"

        if((current_question.parentElement.id   !=  "groupe_29_1")&&(current_question.lastElementChild.name.indexOf(div_type) !== -1)&&(next_plv_ext_itiration==false))
        {
            last_question                       =   last_question.nextElementSibling
            next_question                       =   current_question
            next_plv_ext_itiration              =   true
        }

        else
        {
            current_question.style.display      =   "none"
            
            next_question.parentElement.classList.remove("slide_form_right")
            next_question.parentElement.classList.remove("slide_form_left")

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")

            next_question.style.display         =   "block"
            next_question.classList.add("current_question")
            next_question.classList.add("slide_form_right")

            current_question                    =   current_question.nextElementSibling
        }

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function NextPLVIntFunction()
    {
        GetNextPLVIntElementDisplayed()

        let div_type    =   "Photo_PLV_interieur_"

        if((current_question.parentElement.id   !=  "groupe_28_1")&&(current_question.lastElementChild.name.indexOf(div_type) !== -1)&&(next_plv_int_itiration==false))
        {
            last_question                       =   last_question.nextElementSibling
            next_question                       =   current_question
            next_plv_int_itiration              =   true
        }

        else
        {
            current_question.style.display      =   "none"
            
            next_question.parentElement.classList.remove("slide_form_right")
            next_question.parentElement.classList.remove("slide_form_left")

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")

            next_question.style.display         =   "block"
            next_question.classList.add("current_question")
            next_question.classList.add("slide_form_right")

            current_question                    =   current_question.nextElementSibling
        }

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function NextFacingFunction()
    {
        GetNextFacingElementDisplayed()

        let div_type    =   "Marque_de_produit_(Facing)_"

        if((current_question.parentElement.id   !=  "groupe_31_1")&&(current_question.lastElementChild.name.indexOf(div_type) !== -1)&&(next_facing_itiration==false))
        {
            last_question                       =   last_question.nextElementSibling
            next_question                       =   current_question
            next_facing_itiration               =   true
        }

        else
        {
            current_question.style.display      =   "none"
        
            next_question.parentElement.classList.remove("slide_form_right")
            next_question.parentElement.classList.remove("slide_form_left")

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")

            next_question.style.display         =   "block"
            next_question.classList.add("current_question")
            next_question.classList.add("slide_form_right")

            current_question                    =   current_question.nextElementSibling
        }

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    //

    function GetLastElementDisplayed() 
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.previousElementSibling.tagName !=  "HR")
        {

        }

        else
        {
            current_header              =   current_question.parentElement.firstChild

            current_question.parentElement.style.display                            =   "none"
            current_question.parentElement.previousElementSibling.style.display     =   "block"

            //Hide All Questions except first question
            HideElementsDansDiv(current_question.parentElement.previousElementSibling.id)
            HideElementsDansDiv(current_question.parentElement.id)
            showLastChild(current_question.parentElement.previousElementSibling.id)

            next_question               =   current_question                 
        } 
    }

    function GetLastAuditElementDisplayed() 
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.previousElementSibling.tagName !=  "HR")
        {
            
        }

        else
        {
            if(current_question.parentElement.id ==  "groupe_26_1")
            {
                current_header              =   current_question.parentElement.firstChild

                current_question.parentElement.style.display    =   "none"
                
                document.getElementById("groupe_22_1").style.display    =   "block"

                //Hide All Questions except first question
                HideElementsDansDiv(current_question.parentElement.id)
                HideElementsDansDiv("groupe_22_1")
                showLastChild("groupe_22_1")

                next_question               =   current_question       
            }

            else
            {
                if(current_question.parentElement.id ==  "groupe_30_1")
                {
                    current_header              =   current_question.parentElement.firstChild

                    current_question.parentElement.style.display    =   "none"
                    
                    document.getElementById("groupe_26_1").style.display    =   "block"

                    //Hide All Questions except first question
                    HideElementsDansDiv(current_question.parentElement.id)
                    HideElementsDansDiv("groupe_26_1")
                    showLastChild("groupe_26_1")

                    next_question               =   current_question       
                }

                else
                {
                    if(current_question.parentElement.id ==  "groupe_34_1")
                    {
                        current_header              =   current_question.parentElement.firstChild

                        current_question.parentElement.style.display    =   "none"
                        
                        document.getElementById("groupe_30_1").style.display    =   "block"

                        //Hide All Questions except first question
                        HideElementsDansDiv(current_question.parentElement.id)
                        HideElementsDansDiv("groupe_30_1")
                        showLastChild("groupe_30_1")

                        next_question               =   current_question       
                    }

                    else
                    {
                        current_header              =   current_question.parentElement.firstChild

                        current_question.parentElement.style.display    =   "none"
                        current_question.parentElement.previousElementSibling.style.display    =   "block"

                        //Hide All Questions except first question
                        HideElementsDansDiv(current_question.parentElement.previousElementSibling.id)
                        HideElementsDansDiv(current_question.parentElement.id)
                        showLastChild(current_question.parentElement.previousElementSibling.id)

                        next_question               =   current_question  
                    }
                }
            }               
        }
    }

    function GetLastAchatElementDisplayed() 
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.previousElementSibling.tagName !=  "HR")
        {    
            last_question   =   current_question.previousElementSibling  
        }

        else
        {
            //Hide All Questions except first question
            if(current_question.parentElement.id    ==  "achat_1")
            {
                current_question.parentElement.style.display    =   "none"

                HideAchatElementsDansDiv(current_question.parentElement.id)
                showLastAchatChild(current_question.parentElement.parentElement.id)
            }
            
            else
            {
                current_question.parentElement.style.display    =   "none"
                current_question.parentElement.previousElementSibling.style.display    =   "block"

                HideAchatElementsDansDiv(current_question.parentElement.id)
                HideAchatElementsDansDiv(current_question.parentElement.previousElementSibling.id)
                showLastAchatChild(current_question.parentElement.previousElementSibling.id)
            }  
        } 
    }
        
    function GetLastFrigoElementDisplayed()
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.previousElementSibling.tagName !=  "HR")
        {    
            last_question   =   current_question.previousElementSibling  
        }

        else
        {
            //Hide All Questions except first question
            if(current_question.parentElement.id    ==  "frigo_1")
            {
                current_question.parentElement.style.display    =   "none"

                HideFrigoElementsDansDiv(current_question.parentElement.id)
                showLastFrigoChild(current_question.parentElement.parentElement.id)
            }
            
            else
            {
                current_question.parentElement.style.display    =   "none"
                current_question.parentElement.previousElementSibling.style.display    =   "block"

                HideFrigoElementsDansDiv(current_question.parentElement.id)
                HideFrigoElementsDansDiv(current_question.parentElement.previousElementSibling.id)
                showLastFrigoChild(current_question.parentElement.previousElementSibling.id)
            }  
        }
    }

    function GetLastPLVExtElementDisplayed()
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.previousElementSibling.tagName !=  "HR")
        {    
            last_question   =   current_question.previousElementSibling  
        }

        else
        {
            //Hide All Questions except first question
            if(current_question.parentElement.id    ==  "block_nv_plv_ext_1")
            {
                current_question.parentElement.style.display    =   "none"

                HidePLVExtElementsDansDiv(current_question.parentElement.id)
                showLastPLVExtChild(current_question.parentElement.parentElement.id)
            }
            
            else
            {
                current_question.parentElement.style.display    =   "none"
                current_question.parentElement.previousElementSibling.style.display    =   "block"

                HidePLVExtElementsDansDiv(current_question.parentElement.id)
                HidePLVExtElementsDansDiv(current_question.parentElement.previousElementSibling.id)
                showLastPLVExtChild(current_question.parentElement.previousElementSibling.id)
            }  
        }
    }

    function GetLastPLVIntElementDisplayed()
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.previousElementSibling.tagName !=  "HR")
        {    
            last_question   =   current_question.previousElementSibling  
        }

        else
        {
            //Hide All Questions except first question
            if(current_question.parentElement.id    ==  "block_nv_plv_int_1")
            {
                current_question.parentElement.style.display    =   "none"

                HidePLVIntElementsDansDiv(current_question.parentElement.id)
                showLastPLVIntChild(current_question.parentElement.parentElement.id)
            }
            
            else
            {
                current_question.parentElement.style.display    =   "none"
                current_question.parentElement.previousElementSibling.style.display    =   "block"

                HidePLVIntElementsDansDiv(current_question.parentElement.id)
                HidePLVIntElementsDansDiv(current_question.parentElement.previousElementSibling.id)
                showLastPLVIntChild(current_question.parentElement.previousElementSibling.id)
            }  
        }
    }

    function GetLastFacingElementDisplayed()
    {
        var elm = {};
        var elm = document.getElementsByClassName("current_question")[0];

        if(current_question.previousElementSibling.tagName !=  "HR")
        {    
            last_question   =   current_question.previousElementSibling  
        }

        else
        {
            //Hide All Questions except first question
            if(current_question.parentElement.id    ==  "facing_1")
            {
                current_question.parentElement.style.display    =   "none"

                HideFacingElementsDansDiv(current_question.parentElement.id)
                showLastFacingChild(current_question.parentElement.parentElement.id)
            }
            
            else
            {
                current_question.parentElement.style.display    =   "none"
                current_question.parentElement.previousElementSibling.style.display    =   "block"

                HideFacingElementsDansDiv(current_question.parentElement.id)
                HideFacingElementsDansDiv(current_question.parentElement.previousElementSibling.id)
                showLastFacingChild(current_question.parentElement.previousElementSibling.id)
            }  
        }
    }

    //

    function LastFunction()
    {
        GetLastElementDisplayed();

        current_question.style.display      =   "none"

        current_question.classList.remove("current_question")
        current_question.classList.remove("slide_form_right")
        current_question.classList.remove("slide_form_left")
    
        last_question.style.display         =   "block"

        last_question.classList.add("current_question")
        last_question.classList.add("slide_form_left")

        current_question                    =   last_question
        next_question                       =   current_question
        last_question                       =   last_question.previousElementSibling

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function LastAuditFunction()
    {
        GetLastAuditElementDisplayed();

        current_question.style.display      =   "none"

        current_question.classList.remove("current_question")
        current_question.classList.remove("slide_form_right")
        current_question.classList.remove("slide_form_left")
    
        last_question.style.display         =   "block"

        last_question.classList.add("current_question")
        last_question.classList.add("slide_form_left")

        current_question                    =   last_question
        next_question                       =   current_question
        last_question                       =   last_question.previousElementSibling

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function LastAchatFunction()
    {
        GetLastAchatElementDisplayed()

        current_question.style.display      =   "none"

        current_question.classList.remove("current_question")
        current_question.classList.remove("slide_form_right")
        current_question.classList.remove("slide_form_left")
    
        last_question.style.display         =   "block"

        last_question.classList.add("current_question")
        last_question.classList.add("slide_form_left")

        current_question                    =   last_question
        next_question                       =   current_question
        last_question                       =   last_question.previousElementSibling

        ShowLastButton()
        HideLastButton()

        ShowNextButton()
        HideNextButton()
    }

    function LastFrigoFunction()
    {
        //Verfy if its the first question in the first bloc
        let current_question_class  =   document.getElementsByClassName("current_question")[0]

        if(((current_question_class.parentElement.id    ==  "groupe_23_1")&&(document.getElementById("groupe_23_1").getElementsByClassName("form-group")[0]     !=  current_question_class))
        ||((current_question_class.parentElement.id     !=  "groupe_23_1")&&(document.getElementById("groupe_23_1").getElementsByClassName("form-group")[0]     !=  document.getElementById(current_question_class.parentElement.id).getElementsByClassName("form-group")[0])))
        {
            frigo_first_question    =   false
        }

        //cas non 1ere question
        if(frigo_first_question     ==  false)
        {
            GetLastFrigoElementDisplayed()

            current_question.style.display      =   "none"

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
        
            last_question.style.display         =   "block"

            last_question.classList.add("current_question")
            last_question.classList.add("slide_form_left")

            current_question                    =   last_question
            next_question                       =   current_question
            last_question                       =   last_question.previousElementSibling

            ShowLastButton()
            HideLastButton()

            ShowNextButton()
            HideNextButton()
        }

        //cas 1ere question
        else
        {
            GoToNombreFrigo()
            
            Frigo_23.style.display                                      =   "none"
            HideFrigoElementsDansDiv("groupe_23_1")
        }
    }

    function LastPLVExtFunction()
    {
        //Verfy if its the first question in the first bloc
        let current_question_class  =   document.getElementsByClassName("current_question")[0]

        if(((current_question_class.parentElement.id    ==  "groupe_29_1")&&(document.getElementById("groupe_29_1").getElementsByClassName("form-group")[0]     !=  current_question_class))
        ||((current_question_class.parentElement.id     !=  "groupe_29_1")&&(document.getElementById("groupe_29_1").getElementsByClassName("form-group")[0]     !=  document.getElementById(current_question_class.parentElement.id).getElementsByClassName("form-group")[0])))
        {
            plv_ext_first_question      =   false
        }

        //cas non 1ere question
        if(plv_ext_first_question     ==  false)
        {
            GetLastPLVExtElementDisplayed()

            current_question.style.display      =   "none"

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
        
            last_question.style.display         =   "block"

            last_question.classList.add("current_question")
            last_question.classList.add("slide_form_left")

            current_question                    =   last_question
            next_question                       =   current_question
            last_question                       =   last_question.previousElementSibling

            ShowLastButton()
            HideLastButton()

            ShowNextButton()
            HideNextButton()
        }

        //cas 1ere question
        else
        {
            GoToNombrePLVExt()
            
            Plv_ext_29.style.display                                      =   "none"
            HideFrigoElementsDansDiv("groupe_29_1")
        }
    }

    function LastPLVIntFunction()
    {
        //Verfy if its the first question in the first bloc
        let current_question_class  =   document.getElementsByClassName("current_question")[0]

        if(((current_question_class.parentElement.id    ==  "groupe_28_1")&&(document.getElementById("groupe_28_1").getElementsByClassName("form-group")[0]     !=  current_question_class))
        ||((current_question_class.parentElement.id     !=  "groupe_28_1")&&(document.getElementById("groupe_28_1").getElementsByClassName("form-group")[0]     !=  document.getElementById(current_question_class.parentElement.id).getElementsByClassName("form-group")[0])))
        {
            plv_int_first_question      =   false
        }

        //cas non 1ere question
        if(plv_int_first_question     ==  false)
        {
            GetLastPLVIntElementDisplayed()

            current_question.style.display      =   "none"

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
        
            last_question.style.display         =   "block"

            last_question.classList.add("current_question")
            last_question.classList.add("slide_form_left")

            current_question                    =   last_question
            next_question                       =   current_question
            last_question                       =   last_question.previousElementSibling

            ShowLastButton()
            HideLastButton()

            ShowNextButton()
            HideNextButton()
        }

        //cas 1ere question
        else
        {
            GoToNombrePLVInt()
            
            Plv_int_28.style.display                                      =   "none"
            HideFrigoElementsDansDiv("groupe_28_1")
        }
    }

    function LastFacingFunction()
    {
        //Verfy if its the first question in the first bloc
        let current_question_class  =   document.getElementsByClassName("current_question")[0]

        if(((current_question_class.parentElement.id    ==  "groupe_31_1")&&(document.getElementById("groupe_31_1").getElementsByClassName("form-group")[0]     !=  current_question_class))
        ||((current_question_class.parentElement.id     !=  "groupe_31_1")&&(document.getElementById("groupe_31_1").getElementsByClassName("form-group")[0]     !=  document.getElementById(current_question_class.parentElement.id).getElementsByClassName("form-group")[0])))
        {
            facing_first_question      =   false
        }

        //cas non 1ere question
        if(facing_first_question     ==  false)
        {
            GetLastFacingElementDisplayed()

            current_question.style.display      =   "none"

            current_question.classList.remove("current_question")
            current_question.classList.remove("slide_form_right")
            current_question.classList.remove("slide_form_left")
        
            last_question.style.display         =   "block"

            last_question.classList.add("current_question")
            last_question.classList.add("slide_form_left")

            current_question                    =   last_question
            next_question                       =   current_question
            last_question                       =   last_question.previousElementSibling

            ShowLastButton()
            HideLastButton()

            ShowNextButton()
            HideNextButton()
        }

        //cas 1ere question
        else
        {
            GoToNombreFacing()
            
            Facing_31.style.display                                      =   "none"
            HideFrigoElementsDansDiv("groupe_31_1")
        }
    }

    //

    //Buttons

    //

    function ShowLastButton()
    {
        LastButton.style.display        =   "inline-block"
        LastButton.classList.add("slide_form_left")
        BackFunctionHide()
    }

    function HideLastButton()
    {   
        let current_question_class  =   document.getElementsByClassName("current_question")[0]

        //cas FRIGO, PLV INT, PLV EXT, FACING changement des variables booleans
        if((current_question_class.parentElement)
        &&(current_question_class.parentElement.firstElementChild)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling))
        {
            if((current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling == current_question_class)
            &&(current_question_class.parentElement.id    ==  "groupe_23_1"))
            {
                frigo_first_question    =   true
                plv_int_first_question  =   false
                plv_ext_first_question  =   false  
                facing_first_question   =   false
            }

            else
            {   
                if(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling)
                {
                    if(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling)
                    {
                        if(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling == current_question_class)
                        {
                            if(current_question_class.parentElement.id   ==  "groupe_28_1")
                            {
                                frigo_first_question    =   false
                                plv_int_first_question  =   true
                                plv_ext_first_question  =   false  
                                facing_first_question   =   false
                            }

                            else
                            {
                                if(current_question_class.parentElement.id   ==  "groupe_29_1")
                                {
                                    frigo_first_question    =   false
                                    plv_int_first_question  =   false
                                    plv_ext_first_question  =   true  
                                    facing_first_question   =   false
                                }

                                else
                                {
                                    if(current_question_class.parentElement.id   ==  "groupe_31_1")
                                    {
                                        frigo_first_question    =   false
                                        plv_int_first_question  =   false
                                        plv_ext_first_question  =   false  
                                        facing_first_question   =   true
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }  

        //cas Audit
        if((current_question_class.parentElement.id == "groupe_22_1")
        &&(current_question_class.parentElement)
        &&(current_question_class.parentElement.firstElementChild)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling == current_question_class))
        {   
            if((frigo_first_question    ==  false)&&(frigo_first_question    ==  false)&&(frigo_first_question    ==  false)&&(frigo_first_question    ==  false))
            {
                LastButton.style.display        =   "none"
                LastButton.classList.remove("slide_form_left")
                BackFunctionShow()
            }
        }

        //cas FRIGO cas achat
        if(((current_question_class.parentElement.id != "groupe_28_1")&&(current_question_class.parentElement.id != "groupe_29_1")&&(current_question_class.parentElement.id != "groupe_31_1")&&(current_question_class.parentElement.id != "groupe_22_1")&&(current_question_class.parentElement.id != "groupe_26_1")&&(current_question_class.parentElement.id != "groupe_30_1")&&(current_question_class.parentElement.id != "groupe_34_1")&&(current_question_class.parentElement.id != "groupe_35_1")&&(current_question_class.parentElement.id != "groupe_36_1"))
        &&(current_question_class.parentElement)
        &&(current_question_class.parentElement.firstElementChild)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling == current_question_class))
        {   
            if((frigo_first_question    ==  false)&&(frigo_first_question    ==  false)&&(frigo_first_question    ==  false)&&(frigo_first_question    ==  false))
            {
                LastButton.style.display        =   "none"
                LastButton.classList.remove("slide_form_left")
                BackFunctionShow()
            }
        }  

        //cas Facing, PLV INT, PLV EXT
        if(((current_question_class.parentElement.id == "groupe_28_1")||(current_question_class.parentElement.id == "groupe_29_1")||(current_question_class.parentElement.id == "groupe_31_1"))
        &&(current_question_class.parentElement)
        &&(current_question_class.parentElement.firstElementChild)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling)
        &&(current_question_class.parentElement.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling == current_question_class))
        {

            if((frigo_first_question    ==  false)&&(plv_ext_first_question    ==  false)&&(plv_int_first_question    ==  false)&&(facing_first_question    ==  false))
            {
                LastButton.style.display        =   "none"
                LastButton.classList.remove("slide_form_left")
                BackFunctionShow()
            }
        }  
    }

    function ShowNextButton()
    {
        NextButton.style.display        =   "inline-block"
        NextButton.classList.add("slide_form_right")
        SauvgarderFunctionHide()
    }

    function HideNextButton()
    {
        //Audit
        if(
            (current_question.parentElement.id    ==  "groupe_22_1")
        ||  (current_question.parentElement.id    ==  "groupe_26_1")
        ||  (current_question.parentElement.id    ==  "groupe_30_1")
        ||  (current_question.parentElement.id    ==  "groupe_34_1")
        ||  (current_question.parentElement.id    ==  "groupe_35_1"))
        {
            //Audit
            if((current_question.parentElement.lastElementChild)
            &&((current_question.lastElementChild))
            &&(current_question.lastElementChild.id    ==  "Conseil_ou_recomendation")
            &&(current_question.parentElement.lastElementChild.previousElementSibling == current_question))
            {
                NextButton.style.display        =   "none"
                NextButton.classList.remove("slide_form_right")
                SauvgarderFunctionShow()
            }
        }

        else
        {
            //Info
            if((current_question.parentElement.lastElementChild)
            &&((current_question.lastElementChild))
            &&(current_question.lastElementChild.id    ==  "Type_de_Magasin")
            &&(current_question.parentElement.lastElementChild.previousElementSibling == current_question))
            {
                NextButton.style.display        =   "none"
                NextButton.classList.remove("slide_form_right")
                SauvgarderFunctionShow()
            }

            //Produits
            if((current_question.parentElement.lastElementChild)
            &&((current_question.lastElementChild))
            &&(current_question.lastElementChild.id    ==  "Photo_des_produits_sur_rayon[]")
            &&(current_question.parentElement.lastElementChild.previousElementSibling == current_question))
            {
                NextButton.style.display        =   "none"
                NextButton.classList.remove("slide_form_right")
                SauvgarderFunctionShow()
            }

            //Achat Frigo PLV Facing (cas plusieurs)
            if((current_question.parentElement.parentElement)
            &&(current_question.parentElement.lastElementChild)
            &&(current_question.parentElement.lastElementChild.previousElementSibling == current_question)
            &&(current_question.parentElement.parentElement.lastElementChild.previousElementSibling == current_question.parentElement))
            {
                NextButton.style.display        =   "none"
                NextButton.classList.remove("slide_form_right")
                SauvgarderFunctionShow()
            }

            //Achat Frigo PLV Facing (cas 1 seul)
            if((current_question.parentElement)
            &&(current_question.parentElement.parentElement)
            &&(current_question.parentElement.lastElementChild)
            &&(current_question.parentElement.lastElementChild.previousElementSibling == current_question)
            &&(current_question.parentElement.parentElement.tagName ==  "FORM"))
            {
                

                NextButton.style.display        =   "none"
                NextButton.classList.remove("slide_form_right")
                SauvgarderFunctionShow()
            }
        }
    }

    //

    //

    // Events

    //

    //

    function RemoveEvents()
    {
        const new_last_button   =   LastButton.cloneNode(true)
        LastButton.parentNode.insertBefore(new_last_button, LastButton)
        new_last_button.id      =   LastButton.id
        LastButton.remove()
        
        LastButton              =   new_last_button

        const new_next_button   =   NextButton.cloneNode(true)
        NextButton.parentNode.insertBefore(new_next_button, NextButton)
        new_next_button.id      =   NextButton.id
        NextButton.remove()

        NextButton              =   new_next_button
    }

    //

    function AddInfoEvents()
    {
        document.getElementById("last")         .addEventListener("click", LastFunction);
        document.getElementById("next")         .addEventListener("click", NextFunction);
    }

    //

    function AddAchatEvents()
    {
        document.getElementById("last")         .addEventListener("click", LastAchatFunction);
        document.getElementById("next")         .addEventListener("click", NextAchatFunction);
    }

    //

    function AddAuditEvents()
    {
        document.getElementById("last")         .addEventListener("click", LastAuditFunction);
        document.getElementById("next")         .addEventListener("click", NextAuditFunction);
    }

    //

    function AddFrigoEvents()
    {
        document.getElementById("last")         .addEventListener("click", LastFrigoFunction);
        document.getElementById("next")         .addEventListener("click", NextFrigoFunction);
    }

    //

    function AddPLVExtEvents()
    {
        document.getElementById("last")         .addEventListener("click", LastPLVExtFunction);
        document.getElementById("next")         .addEventListener("click", NextPLVExtFunction);
    }

    //

    function AddPLVIntEvents()
    {
        document.getElementById("last")         .addEventListener("click", LastPLVIntFunction);
        document.getElementById("next")         .addEventListener("click", NextPLVIntFunction);
    }

    //

    function AddFacingEvents()
    {
        document.getElementById("last")         .addEventListener("click", LastFacingFunction);
        document.getElementById("next")         .addEventListener("click", NextFacingFunction);
    }

    //

    //  Frigo

    //

    //Ajouter la page "Est ce que vous voullez ajouter un frigo ?"
    function PageFrigoEvents()
    {
        let div  =  document.getElementById("ajouter_frigo")   

        NextButton.style.display  =   "inline-block"
        NextButton.innerHTML      =   "Oui"

        LastButton.style.display  =   "inline-block"
        LastButton.innerHTML      =   "Non"

        if(div == null)
        {
            const div_parent        = document.createElement('DIV');

            const h4_frigo_response = document.createElement('H4');
            const hr_frigo_response = document.createElement('HR');
            const br_frigo_response = document.createElement('BR');

            h4_frigo_response.innerHTML     =   "Est ce que vous voullez ajouter un frigo ?"
            
            div_parent.appendChild(h4_frigo_response)
            div_parent.appendChild(hr_frigo_response)
            div_parent.appendChild(br_frigo_response)
            
            div_parent.id                   =   "ajouter_frigo"

            NextButton.parentNode.insertBefore(div_parent, NextButton);

            RemoveEvents();

            NextButton.addEventListener("click", GoToNombreFrigo);
            LastButton.addEventListener("click", GoBackMobileDivs_Frigo);
        }

        else
        {
            let frigos_number_input =   document.getElementById("frigos_number_input")
            
            if((frigos_number_input)&&(frigos_number_input.nextElementSibling)&&frigos_number_input.nextElementSibling.nextElementSibling)
            {
                frigos_number_input.nextElementSibling.nextElementSibling.remove()
                frigos_number_input.nextElementSibling.remove()
                frigos_number_input.remove()
            }

            div.firstElementChild.innerHTML =   "Est ce que vous voullez ajouter un frigo ?"
            div.classList.add("slide_form_left")
            div.classList.remove("slide_form_right")

            RemoveEvents();

            NextButton.addEventListener("click", GoToNombreFrigo)
            LastButton.addEventListener("click", GoBackMobileDivs_Frigo)
        }
    }

    function GoToNombreFrigo()
    {
        NextButton.style.display  =   "inline-block"
        NextButton.innerHTML      =   "Oui"

        LastButton.style.display  =   "inline-block"
        LastButton.innerHTML      =   "Non"

        if(document.getElementById("frigos_number_input") == null)
        {
            document.getElementById("ajouter_frigo").firstElementChild.innerHTML    =   "Veuillez saisir le nombre des frigos ?"

            let frigos_number_input     =   document.createElement('input')
            let br1   =   document.createElement('BR')
            let br2   =   document.createElement('BR')

            frigos_number_input.classList.add("form-control")
            frigos_number_input.id      =   "frigos_number_input"

            document.getElementById("ajouter_frigo").appendChild(frigos_number_input)
            document.getElementById("ajouter_frigo").appendChild(br1)
            document.getElementById("ajouter_frigo").appendChild(br2)

            document.getElementById("ajouter_frigo").classList.add("slide_form_right")
            document.getElementById("ajouter_frigo").classList.remove("slide_form_left")

            RemoveEvents()

            LastButton.addEventListener("click", PageFrigoEvents);
            NextButton.addEventListener("click", FirstQuestionFrigo);

            frigos_number_input.addEventListener("change", function(){
                frigos_number   =   frigos_number_input.value
            })
        }

        else
        {
            document.getElementById("ajouter_frigo").style.display              =   "block"

            document.getElementById("ajouter_frigo").classList.add("slide_form_left")
            document.getElementById("ajouter_frigo").classList.remove("slide_form_right")

            RemoveEvents()

            LastButton.addEventListener("click", PageFrigoEvents);
            NextButton.addEventListener("click", FirstQuestionFrigo);
        }
    }

    function GoBackMobileDivs_Frigo()
    {  
        HideAll();
    }

    function Frigo_Ajouter()
    {
        var Model_frigo     =   document.getElementById("Disponibilité_Frigo")

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
            

            if(element.getAttribute("type") != "button")
            {
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
            }

            block_nv_frigo.appendChild(div_block_nv_frigo)
        });

        if(m    ==  1)
        {
            var element_insert              =   document.getElementById("Photo_du_frigo")
            element_insert.parentNode.parentNode.insertBefore(block_nv_frigo,element_insert.parentNode.nextSibling)
        }
        else
        {
            var element_insert              =   document.getElementById("Photo_du_frigo_"+(m-1))
            element_insert.parentNode.parentNode.parentNode.insertBefore(block_nv_frigo,element_insert.parentNode.parentNode.nextSibling)
        }

        var elm     =   GetElementInsideContainer("frigo_"+m, "Disponibilité_Frigo_"+m)
        
        elm.value   =   1;

        GriserSelect("Disponibilité_Frigo_"+m)

        m   =   m+1;

    }

    function FirstQuestionFrigo()
    {
        InitialiserNombreFrigo()

        document.getElementById("ajouter_frigo").style.display      =   "none"
        
        Frigo_23.style.display                                      =   "block"

        LastButton.innerHTML                                        =   "Precedent"
        NextButton.innerHTML                                        =   "Suivant"

        //Hide All Questions except first question
        HideFrigoElementsDansDiv("groupe_23_1")

        showFirstFrigoChild("groupe_23_1")

        RemoveEvents()
        AddFrigoEvents()

        ShowNextButton()
        HideNextButton()

        ShowLastButton()
        HideLastButton()

        SubmitFunctionHide()
    }

    function InitialiserNombreFrigo()
    {
        for (let i = 1; i < frigos_number; i++) 
        {
            Frigo_Ajouter()
        }
    }

    //

    //  PLV Exterieur

    //

    //Ajouter la page "Est ce que vous voullez ajouter un plv exterieur ?"
    function PagePLVExtEvents()
    {
        let div  =  document.getElementById("ajouter_plv_ext")   

        NextButton.style.display  =   "inline-block"
        NextButton.innerHTML      =   "Oui"

        LastButton.style.display  =   "inline-block"
        LastButton.innerHTML      =   "Non"

        if(div == null)
        {
            const div_parent        = document.createElement('DIV');

            const h4_plv_ext_response = document.createElement('H4');
            const hr_plv_ext_response = document.createElement('HR');
            const br_plv_ext_response = document.createElement('BR');

            h4_plv_ext_response.innerHTML     =   "Est ce que vous voullez ajouter un plv exterieur ?"
            
            div_parent.appendChild(h4_plv_ext_response)
            div_parent.appendChild(hr_plv_ext_response)
            div_parent.appendChild(br_plv_ext_response)
            
            div_parent.id                   =   "ajouter_plv_ext"

            NextButton.parentNode.insertBefore(div_parent, NextButton);

            RemoveEvents();

            NextButton.addEventListener("click", GoToNombrePLVExt);
            LastButton.addEventListener("click", GoBackMobileDivs_PLV_Ext);
        }

        else
        {
            let plv_ext_number_input =   document.getElementById("plv_ext_number_input")

            if((plv_ext_number_input)&&(plv_ext_number_input.nextElementSibling)&&plv_ext_number_input.nextElementSibling.nextElementSibling)
            {
                plv_ext_number_input.nextElementSibling.nextElementSibling.remove()
                plv_ext_number_input.nextElementSibling.remove()
                plv_ext_number_input.remove()
            }

            div.firstElementChild.innerHTML =   "Est ce que vous voullez ajouter un plv exterieur ?"
            div.classList.add("slide_form_left")
            div.classList.remove("slide_form_right")

            RemoveEvents();

            NextButton.addEventListener("click", GoToNombrePLVExt)
            LastButton.addEventListener("click", GoBackMobileDivs_PLV_Ext)
        }
    }

    function GoToNombrePLVExt()
    {
        NextButton.style.display  =   "inline-block"
        NextButton.innerHTML      =   "Oui"

        LastButton.style.display  =   "inline-block"
        LastButton.innerHTML      =   "Non"

        if(document.getElementById("plv_ext_number_input") == null)
        {
            document.getElementById("ajouter_plv_ext").firstElementChild.innerHTML    =   "Veuillez saisir le nombre des plv exterieur ?"

            let plv_ext_number_input     =   document.createElement('input')
            let br1   =   document.createElement('BR')
            let br2   =   document.createElement('BR')

            plv_ext_number_input.classList.add("form-control")
            plv_ext_number_input.id      =   "plv_ext_number_input"

            document.getElementById("ajouter_plv_ext").appendChild(plv_ext_number_input)
            document.getElementById("ajouter_plv_ext").appendChild(br1)
            document.getElementById("ajouter_plv_ext").appendChild(br2)

            RemoveEvents()

            document.getElementById("ajouter_plv_ext").classList.add("slide_form_right")
            document.getElementById("ajouter_plv_ext").classList.remove("slide_form_left")

            LastButton.addEventListener("click", PagePLVExtEvents);
            NextButton.addEventListener("click", FirstQuestionPLVExt);

            plv_ext_number_input.addEventListener("change", function(){
                plv_ext_number   =   plv_ext_number_input.value
            })
        }
        else
        {
            document.getElementById("ajouter_plv_ext").style.display              =   "block"

            document.getElementById("ajouter_plv_ext").classList.add("slide_form_left")
            document.getElementById("ajouter_plv_ext").classList.remove("slide_form_right")

            RemoveEvents()

            LastButton.addEventListener("click"         ,   PagePLVExtEvents);
            NextButton.addEventListener("click"         ,   FirstQuestionPLVExt);
        }
    }

    function GoBackMobileDivs_PLV_Ext()
    {   
        HideAll();
    }

    function PLVExterieur_Ajouter()
    {
        var PLV_ext_inputs              =   document.getElementsByClassName("groupe_29")
        
        var break_line_1                =   document.createElement('hr')
        var block_nv_plv_ext            =   document.createElement('div')
        var break_space_1               =   document.createElement('br')
        var break_line_2                =   document.createElement('hr')
        var header_plv_ext              =   document.createElement('h4')

        header_plv_ext.innerHTML        =   "Ajouter un nouveau PLV Exterieur"

        block_nv_plv_ext.id             =   "block_nv_plv_ext_"+j

        block_nv_plv_ext.appendChild(break_space_1)
        block_nv_plv_ext.appendChild(break_line_1)
        block_nv_plv_ext.appendChild(header_plv_ext)
        block_nv_plv_ext.appendChild(break_line_2)

        Array.from(PLV_ext_inputs).forEach((element) => {

            var div_block_nv_plv_ext        =   document.createElement("div")
            div_block_nv_plv_ext.className  =   element.parentElement.className
            
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
                if(element.type !=  "button")
                {
                    label_new.innerHTML         =   element.previousSibling.previousSibling.previousSibling.innerHTML
                    input_new.type              =   "file"

                    div_block_nv_plv_ext.appendChild(label_new)
                    div_block_nv_plv_ext.appendChild(break_space_2)
                    div_block_nv_plv_ext.appendChild(input_new)

                    block_nv_plv_ext.appendChild(div_block_nv_plv_ext)
                }
            }

            else
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.innerHTML         =   element.innerHTML

                div_block_nv_plv_ext.appendChild(label_new)
                div_block_nv_plv_ext.appendChild(input_new)

                block_nv_plv_ext.appendChild(div_block_nv_plv_ext)
            }

            
        });

        if(j    ==  1)
        {
            var element_insert              =   document.getElementById("Marque_sur_la_PLV_Exterieur")
            element_insert.parentNode.parentNode.insertBefore(block_nv_plv_ext,element_insert.parentNode.nextSibling)
        }
        else
        {
            var element_insert              =   document.getElementById("Marque_sur_la_PLV_Exterieur_"+(j-1))
            element_insert.parentNode.parentNode.parentNode.insertBefore(block_nv_plv_ext,element_insert.parentNode.parentNode.nextSibling)
        }

        j   =   j+1;

    }

    function FirstQuestionPLVExt()
    {
        InitialiserNombrePLVExt()

        document.getElementById("ajouter_plv_ext").style.display    =   "none"
        
        Plv_ext_29.style.display                                    =   "block"

        LastButton.innerHTML                                        =   "Precedent"
        NextButton.innerHTML                                        =   "Suivant"

        //Hide All Questions except first question
        HidePLVExtElementsDansDiv("groupe_29_1")

        showFirstPLVExtChild("groupe_29_1")

        RemoveEvents()

        ShowNextButton()
        HideNextButton()

        ShowLastButton()
        HideLastButton()

        AddPLVExtEvents()
        SubmitFunctionHide()
    }

    function InitialiserNombrePLVExt()
    {
        for (let i = 1; i < plv_ext_number; i++) 
        {
            PLVExterieur_Ajouter()
        }
    }

    //

    //  PLV Interieur

    //

    //Ajouter la page "Est ce que vous voullez ajouter un plv interieur ?"
    function PagePLVIntEvents()
    {
        let div  =  document.getElementById("ajouter_plv_int")   

        NextButton.style.display  =   "inline-block"
        NextButton.innerHTML      =   "Oui"

        LastButton.style.display  =   "inline-block"
        LastButton.innerHTML      =   "Non"

        if(div == null)
        {
            const div_parent            = document.createElement('DIV');

            const h4_plv_int_response   = document.createElement('H4');
            const hr_plv_int_response   = document.createElement('HR');
            const br_plv_int_response   = document.createElement('BR');

            h4_plv_int_response.innerHTML     =   "Est ce que vous voullez ajouter un plv interieur ?"
            
            div_parent.appendChild(h4_plv_int_response)
            div_parent.appendChild(hr_plv_int_response)
            div_parent.appendChild(br_plv_int_response)
            
            div_parent.id                   =   "ajouter_plv_int"

            NextButton.parentNode.insertBefore(div_parent, NextButton);

            RemoveEvents();

            NextButton.addEventListener("click", GoToNombrePLVInt);
            LastButton.addEventListener("click", GoBackMobileDivs_PLV_Int);
        }

        else
        {
            let plv_int_number_input =   document.getElementById("plv_int_number_input")

            if((plv_int_number_input)&&(plv_int_number_input.nextElementSibling)&&plv_int_number_input.nextElementSibling.nextElementSibling)
            {
                plv_int_number_input.nextElementSibling.nextElementSibling.remove()
                plv_int_number_input.nextElementSibling.remove()
                plv_int_number_input.remove()
            }

            div.firstElementChild.innerHTML =   "Est ce que vous voullez ajouter un plv interieur ?"
            div.classList.add("slide_form_left")
            div.classList.remove("slide_form_right")

            RemoveEvents();

            NextButton.addEventListener("click", GoToNombrePLVInt);
            LastButton.addEventListener("click", GoBackMobileDivs_PLV_Int);
        }
    }

    function GoToNombrePLVInt()
    {
        NextButton.style.display  =   "inline-block"
        NextButton.innerHTML      =   "Oui"

        LastButton.style.display  =   "inline-block"
        LastButton.innerHTML      =   "Non"

        if(document.getElementById("plv_int_number_input") == null)
        {
            document.getElementById("ajouter_plv_int").firstElementChild.innerHTML    =   "Veuillez saisir le nombre des plv interieur ?"

            let plv_int_number_input     =   document.createElement('input')
            let br1   =   document.createElement('BR')
            let br2   =   document.createElement('BR')

            plv_int_number_input.classList.add("form-control")
            plv_int_number_input.id      =   "plv_int_number_input"

            document.getElementById("ajouter_plv_int").appendChild(plv_int_number_input)
            document.getElementById("ajouter_plv_int").appendChild(br1)
            document.getElementById("ajouter_plv_int").appendChild(br2)

            document.getElementById("ajouter_plv_int").classList.add("slide_form_right")
            document.getElementById("ajouter_plv_int").classList.remove("slide_form_left")

            RemoveEvents()

            LastButton.addEventListener("click", PagePLVIntEvents);
            NextButton.addEventListener("click", FirstQuestionPLVInt);

            plv_int_number_input.addEventListener("change", function(){
                plv_int_number   =   plv_int_number_input.value
            })
        }
        else
        {
            document.getElementById("ajouter_plv_int").style.display              =   "block"

            document.getElementById("ajouter_plv_int").classList.add("slide_form_left")
            document.getElementById("ajouter_plv_int").classList.remove("slide_form_right")

            RemoveEvents()

            LastButton.addEventListener("click"         ,   PagePLVIntEvents);
            NextButton.addEventListener("click"         ,   FirstQuestionPLVInt);
        }
    }

    function GoBackMobileDivs_PLV_Int()
    {  
        HideAll();
    }

    function PLVInterieur_Ajouter()
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
                if(element.type !=  "button")
                {
                    label_new.innerHTML         =   element.previousSibling.previousSibling.previousSibling.innerHTML
                    input_new.type              =   "file"

                    div_block_nv_plv_int.appendChild(label_new)
                    div_block_nv_plv_int.appendChild(break_space_2)
                    div_block_nv_plv_int.appendChild(input_new)

                    block_nv_plv_int.appendChild(div_block_nv_plv_int)
                }
            }

            else
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.innerHTML         =   element.innerHTML

                div_block_nv_plv_int.appendChild(label_new)
                div_block_nv_plv_int.appendChild(input_new)

                block_nv_plv_int.appendChild(div_block_nv_plv_int)
            }
        });

        if(i    ==  1)
        {
            var element_insert              =   document.getElementById("Marque_sur_la_PLV_Interieur")
            element_insert.parentNode.parentNode.insertBefore(block_nv_plv_int,element_insert.parentNode.nextSibling)
        }
        else
        {
            var element_insert              =   document.getElementById("Marque_sur_la_PLV_Interieur_"+(i-1))
            element_insert.parentNode.parentNode.parentNode.insertBefore(block_nv_plv_int,element_insert.parentNode.parentNode.nextSibling)
        }

        i   =   i+1;
    }

    function FirstQuestionPLVInt()
    {
        InitialiserNombrePLVInt()

        document.getElementById("ajouter_plv_int").style.display    =   "none"
        
        Plv_int_28.style.display                                    =   "block"

        LastButton.innerHTML                                        =   "Precedent"
        NextButton.innerHTML                                        =   "Suivant"

        //Hide All Questions except first question
        HidePLVIntElementsDansDiv("groupe_28_1")

        showFirstPLVIntChild("groupe_28_1")

        RemoveEvents()

        ShowNextButton()
        HideNextButton()

        ShowLastButton()
        HideLastButton()

        AddPLVIntEvents()
        SubmitFunctionHide()
    }

    function InitialiserNombrePLVInt()
    {
        for (let i = 1; i < plv_int_number; i++) 
        {
            PLVInterieur_Ajouter()
        }
    }

    //

    //  Facing

    //

    //Ajouter la page "Est ce que vous voullez ajouter un facing ?"
    function PageFacingEvents()
    {
        let div  =  document.getElementById("ajouter_facing")   

        NextButton.style.display  =   "inline-block"
        NextButton.innerHTML      =   "Oui"

        LastButton.style.display  =   "inline-block"
        LastButton.innerHTML      =   "Non"

        if(div == null)
        {
            const div_parent            = document.createElement('DIV');

            const h4_facing_response   = document.createElement('H4');
            const hr_facing_response   = document.createElement('HR');
            const br_facing_response   = document.createElement('BR');

            h4_facing_response.innerHTML     =   "Est ce que vous voullez ajouter un produit facing ?"
            
            div_parent.appendChild(h4_facing_response)
            div_parent.appendChild(hr_facing_response)
            div_parent.appendChild(br_facing_response)
            
            div_parent.id                   =   "ajouter_facing"

            NextButton.parentNode.insertBefore(div_parent, NextButton);

            RemoveEvents();

            NextButton.addEventListener("click", GoToNombreFacing);
            LastButton.addEventListener("click", GoBackMobileDivs_Facing);
        }

        else
        {
            let facing_number_input =   document.getElementById("facing_number_input")
            
            if((facing_number_input)&&(facing_number_input.nextElementSibling)&&facing_number_input.nextElementSibling.nextElementSibling)
            {
                facing_number_input.nextElementSibling.nextElementSibling.remove()
                facing_number_input.nextElementSibling.remove()
                facing_number_input.remove()
            }

            div.firstElementChild.innerHTML =   "Est ce que vous voullez ajouter un produit facing ?"
            div.classList.add("slide_form_left")
            div.classList.remove("slide_form_right")

            RemoveEvents();

            NextButton.addEventListener("click", GoToNombrePLVInt)
            LastButton.addEventListener("click", GoBackMobileDivs_PLV_Int)
        }
    }

    function GoToNombreFacing()
    {
        NextButton.style.display  =   "inline-block"
        NextButton.innerHTML      =   "Oui"

        LastButton.style.display  =   "inline-block"
        LastButton.innerHTML      =   "Non"

        if(document.getElementById("facing_number_input") == null)
        {
            document.getElementById("ajouter_facing").firstElementChild.innerHTML    =   "Veuillez saisir le nombre des produits facings"

            let facing_number_input     =   document.createElement('input')
            let br1   =   document.createElement('BR')
            let br2   =   document.createElement('BR')

            facing_number_input.classList.add("form-control")
            facing_number_input.id      =   "facing_number_input"

            document.getElementById("ajouter_facing").appendChild(facing_number_input)
            document.getElementById("ajouter_facing").appendChild(br1)
            document.getElementById("ajouter_facing").appendChild(br2)

            RemoveEvents()

            document.getElementById("ajouter_facing").classList.add("slide_form_right")
            document.getElementById("ajouter_facing").classList.remove("slide_form_left")

            LastButton.addEventListener("click", PageFacingEvents);
            NextButton.addEventListener("click", FirstQuestionFacing);

            facing_number_input.addEventListener("change", function(){
                facings_number           =   facing_number_input.value
            })
        }
        else
        {
            document.getElementById("ajouter_facing").style.display              =   "block"

            document.getElementById("ajouter_facing").classList.add("slide_form_left")
            document.getElementById("ajouter_facing").classList.remove("slide_form_right")

            RemoveEvents()

            LastButton.addEventListener("click"         ,   PageFacingEvents);
            NextButton.addEventListener("click"         ,   FirstQuestionFacing);
        }
    }

    function GoBackMobileDivs_Facing()
    {  
        HideAll();
    }

    function Facing_Ajouter()
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
                if(element.type !=  "button")
                {
                    if(element.getAttribute("type")  ==  "text")
                    {
                        label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                        input_new.type              =   "text"

                        div_block_facing.appendChild(label_new)
                        div_block_facing.appendChild(break_space_2)
                        div_block_facing.appendChild(input_new)

                        block_facing.appendChild(div_block_facing)
                    }

                    else
                    {
                        label_new.innerHTML         =   element.previousSibling.previousSibling.previousSibling.innerHTML
                        input_new.type              =   "file"

                        div_block_facing.appendChild(label_new)
                        div_block_facing.appendChild(break_space_2)
                        div_block_facing.appendChild(input_new)

                        block_facing.appendChild(div_block_facing)
                    }
                }
            }

            else
            {
                label_new.innerHTML         =   element.previousSibling.previousSibling.innerHTML
                input_new.innerHTML         =   element.innerHTML

                div_block_facing.appendChild(label_new)
                div_block_facing.appendChild(input_new)

                block_facing.appendChild(div_block_facing)
            }

        });

        if(l    ==  1)
        {
            var element_insert              =   document.getElementById("Photo_facing")
            element_insert.parentNode.parentNode.insertBefore(block_facing,element_insert.parentNode.nextSibling)
        }

        else
        {
            var element_insert              =   document.getElementById("Photo_facing_"+(l-1))
            element_insert.parentNode.parentNode.parentNode.insertBefore(block_facing,element_insert.parentNode.parentNode.nextSibling)
        }

        l   =   l+1;
    }

    function FirstQuestionFacing()
    {
        InitialiserNombreFacing()

        document.getElementById("ajouter_facing").style.display     =   "none"
        
        Facing_31.style.display                                      =   "block"

        LastButton.innerHTML                                        =   "Precedent"
        NextButton.innerHTML                                        =   "Suivant"

        //Hide All Questions except first question
        HideFacingElementsDansDiv("groupe_31_1")

        showFirstFacingChild("groupe_31_1")

        RemoveEvents()

        ShowNextButton()
        HideNextButton()

        ShowLastButton()
        HideLastButton()

        AddFacingEvents()
        SubmitFunctionHide()
    }

    function InitialiserNombreFacing()
    {
        for (let i = 1; i < facings_number; i++) 
        {
            Facing_Ajouter()
        }
    }

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    //

    //

    // General Functions

    //

    //

    function ButtonsFunctionShow_Question_By_Question()
    {
        ButtonsFunctionHide();

        NextButton.style.display        =   "inline-block"

        NextButton.classList.add("slide_form_right")
    }

    function ButtonsFunctionHide_Question_By_Question()
    {
        ButtonsFunctionHide();

        LastButton.style.display        =   "none"
        NextButton.style.display        =   "none"

        LastButton.classList.remove("slide_form_right")
        NextButton.classList.remove("slide_form_right")
    }

    function Initialisation()
    {
        BackButton          =   document.getElementById("back")
        SauvgarderButton    =   document.getElementById("sauvgarder")
        SubmitButton        =   document.getElementById("submit")

        LastButton          =   document.getElementById("last")
        NextButton          =   document.getElementById("next")

        MobileDivs  =   document.getElementById("mobile_divs")

        InfoPOS_18  =   document.getElementById("groupe_18_1")
        InfoPOS_19  =   document.getElementById("groupe_19_1")
        InfoPOS_20  =   document.getElementById("groupe_20_1")

        Frigo_23    =   document.getElementById("groupe_23_1")

        Plv_int_28  =   document.getElementById("groupe_28_1")
        Plv_ext_29  =   document.getElementById("groupe_29_1")

        Facing_31   =   document.getElementById("groupe_31_1")

        Audit_22    =   document.getElementById("groupe_22_1")
        Audit_26    =   document.getElementById("groupe_26_1")
        Audit_30    =   document.getElementById("groupe_30_1")
        Audit_34    =   document.getElementById("groupe_34_1")
        Audit_35    =   document.getElementById("groupe_35_1")
        Audit_36    =   document.getElementById("groupe_36_1")

        Achat_33    =   document.getElementById("groupe_33_1")

        Produit_42  =   document.getElementById("groupe_42_1")
    }

    function HideAll()
    {
        InfoPOSFunctionHide()
        AchatsFunctionHide()
        FrigosFunctionHide()
        AuditFunctionHide()
        PLVExterieursFunctionHide()
        PLVInterieursFunctionHide()
        ProduitsFunctionHide()
        FacingsFunctionHide()

        ButtonsFunctionHide_Question_By_Question()

        SubmitFunctionShow()
        MobileDivsShow()

        let ajouter_frigo       =   document.getElementById("ajouter_frigo")
        if(ajouter_frigo        !=  null)
        {
            ajouter_frigo.remove()
        }

        let ajouter_plv_ext     =   document.getElementById("ajouter_plv_ext")
        if(ajouter_plv_ext      !=  null)
        {
            ajouter_plv_ext.remove()
        }

        let ajouter_plv_int     =   document.getElementById("ajouter_plv_int")
        if(ajouter_plv_int      !=  null)
        {
            ajouter_plv_int.remove()
        }

        let ajouter_facing      =   document.getElementById("ajouter_facing")
        if(ajouter_facing       !=  null)
        {
            ajouter_facing.remove()
        }
    }

    function MobileDivsShow()
    {
        MobileDivs.style.removeProperty('display');
        MobileDivs.classList.add("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function MobileDivsHide()
    {
        MobileDivs.style.display    =   "none"
        MobileDivs.classList.remove("slide_form_right")

        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }

    function InitialiserElementsDansDiv(containerID) 
    {
        var elm = {};
        var elms = document.getElementById(containerID).getElementsByTagName("*");

        for (var i = 0; i < elms.length; i++) 
        {
            if ((elms[i].tagName    ==  "INPUT")&&(elms[i].getAttribute("type")         !=  "button")) 
            {
                elms[i].value       =   ""
            }

            if (elms[i].tagName     ==  "TEXTAREA") 
            {
                elms[i].value       =   ""
            }

            if ((elms[i].tagName    ==  "SELECT")&&(elms[i].getAttribute("disabled")    !=  "disabled"))
            {
                elms[i].value       =   elms[i].firstChild.value
            }
        }
    }

    function InfoPOSFunctionShow()
    {
        MobileDivsHide()

        InfoPOS_18.style.display    =   "block"
        InfoPOS_19.style.display    =   "block"      
        InfoPOS_20.style.display    =   "block"

        let groupe_18_1 =   document.getElementById("groupe_18_1")
        let groupe_19_1 =   document.getElementById("groupe_19_1")
        let groupe_20_1 =   document.getElementById("groupe_20_1")

        groupe_18_1.classList.add("slide_form_right")
        groupe_19_1.classList.add("slide_form_right")
        groupe_20_1.classList.add("slide_form_right")

        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }

    function InfoPOSFunctionHide()
    {
        MobileDivsShow()

        InfoPOS_18.style.display    =   "none"
        InfoPOS_19.style.display    =   "none"      
        InfoPOS_20.style.display    =   "none"

        let groupe_18_1 =   document.getElementById("groupe_18_1")
        let groupe_19_1 =   document.getElementById("groupe_19_1")
        let groupe_20_1 =   document.getElementById("groupe_20_1")

        groupe_18_1.classList.remove("slide_form_right")
        groupe_19_1.classList.remove("slide_form_right")
        groupe_20_1.classList.remove("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function AchatsFunctionShow()
    {
        MobileDivsHide()

        Achat_33.style.display      =   "block"
        
        let groupe_33_1 =   document.getElementById("groupe_33_1")
        groupe_33_1.classList.add("slide_form_right")


        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }

    function AchatsFunctionHide()
    {
        MobileDivsShow()

        Achat_33.style.display      =   "none"

        let groupe_33_1 =   document.getElementById("groupe_33_1")
        groupe_33_1.classList.remove("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function FrigosFunctionShow()
    {
        MobileDivsHide()

        Frigo_23.style.display      =   "block"

        let groupe_23_1 =   document.getElementById("groupe_23_1")
        groupe_23_1.classList.add("slide_form_right")

        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }

    function FrigosFunctionHide()
    {
        MobileDivsShow()

        Frigo_23.style.display      =   "none"

        let groupe_23_1 =   document.getElementById("groupe_23_1")
        groupe_23_1.classList.remove("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function AuditFunctionShow()
    {
        MobileDivsHide()

        Audit_22.style.display      =   "block"
        Audit_26.style.display      =   "block"
        Audit_30.style.display      =   "block"
        Audit_34.style.display      =   "block"
        Audit_35.style.display      =   "block"
        Audit_36.style.display      =   "block"

        let groupe_22_1 =   document.getElementById("groupe_22_1")
        let groupe_26_1 =   document.getElementById("groupe_26_1")
        let groupe_30_1 =   document.getElementById("groupe_30_1")
        let groupe_34_1 =   document.getElementById("groupe_34_1")
        let groupe_35_1 =   document.getElementById("groupe_35_1")
        let groupe_36_1 =   document.getElementById("groupe_36_1")

        groupe_22_1.classList.add("slide_form_right")
        groupe_26_1.classList.add("slide_form_right")
        groupe_30_1.classList.add("slide_form_right")
        groupe_34_1.classList.add("slide_form_right")
        groupe_35_1.classList.add("slide_form_right")
        groupe_36_1.classList.add("slide_form_right")

        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }
    
    function AuditFunctionHide()
    {
        MobileDivsShow()

        Audit_22.style.display      =   "none"
        Audit_26.style.display      =   "none"
        Audit_30.style.display      =   "none"
        Audit_34.style.display      =   "none"
        Audit_35.style.display      =   "none"
        Audit_36.style.display      =   "none"

        let groupe_22_1 =   document.getElementById("groupe_22_1")
        let groupe_26_1 =   document.getElementById("groupe_26_1")
        let groupe_30_1 =   document.getElementById("groupe_30_1")
        let groupe_34_1 =   document.getElementById("groupe_34_1")
        let groupe_35_1 =   document.getElementById("groupe_35_1")
        let groupe_36_1 =   document.getElementById("groupe_36_1")
        groupe_23_1.classList.remove("slide_form_right")
        groupe_26_1.classList.remove("slide_form_right")
        groupe_30_1.classList.remove("slide_form_right")
        groupe_34_1.classList.remove("slide_form_right")
        groupe_35_1.classList.remove("slide_form_right")
        groupe_36_1.classList.remove("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function PLVExterieursFunctionShow()
    {
        MobileDivsHide()

        Plv_ext_29.style.display    =   "block"

        let groupe_29_1 =   document.getElementById("groupe_29_1")
        groupe_29_1.classList.add("slide_form_right")

        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }

    function PLVExterieursFunctionHide()
    {
        MobileDivsShow()

        Plv_ext_29.style.display    =   "none"

        let groupe_29_1 =   document.getElementById("groupe_29_1")
        groupe_29_1.classList.remove("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function PLVInterieursFunctionShow()
    {
        MobileDivsHide()

        Plv_int_28.style.display    =   "block"

        let groupe_28_1             =   document.getElementById("groupe_28_1")
        groupe_28_1.classList.add("slide_form_right")

        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }
    
    function PLVInterieursFunctionHide()
    {
        MobileDivsShow()

        Plv_int_28.style.display    =   "none"

        let groupe_28_1             =   document.getElementById("groupe_28_1")
        groupe_28_1.classList.remove("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function ProduitsFunctionShow()
    {
        MobileDivsHide()

        Produit_42.style.display    =   "block"

        let groupe_42_1             =   document.getElementById("groupe_42_1")
        groupe_42_1.classList.add("slide_form_right")
       
        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }

    function ProduitsFunctionHide()
    {
        MobileDivsShow()

        Produit_42.style.display    =   "none"

        let groupe_42_1             =   document.getElementById("groupe_42_1")
        groupe_42_1.classList.remove("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function FacingsFunctionShow()
    {
        MobileDivsHide()

        Facing_31.style.display     =   "block"

        let groupe_31_1             =   document.getElementById("groupe_31_1")
        groupe_31_1.classList.add("slide_form_right")
        
        ButtonsFunctionShow_Question_By_Question()
        SubmitFunctionHide()
    }

    function FacingsFunctionHide()
    {
        MobileDivsShow()

        Facing_31.style.display     =   "none"

        let groupe_31_1             =   document.getElementById("groupe_31_1")
        groupe_31_1.classList.remove("slide_form_right")

        ButtonsFunctionHide_Question_By_Question()
        SubmitFunctionShow()
    }

    function ButtonsFunctionShow()
    {
        BackButton.style.display        =   "inline-block"
        SauvgarderButton.style.display  =   "inline-block"

        BackButton.classList.add("slide_form_left")
        SauvgarderButton.classList.add("slide_form_right")
    }

    function ButtonsFunctionHide()
    {
        BackButton.style.display        =   "none"
        SauvgarderButton.style.display  =   "none"

        BackButton.classList.remove("slide_form_left")
        SauvgarderButton.classList.remove("slide_form_right")
    }

    function SauvgarderFunctionShow()
    {
        SauvgarderButton.style.display  =   "inline-block"
        SauvgarderButton.classList.add("slide_form_right")
    }

    function BackFunctionShow()
    {
        BackButton.style.display  =   "inline-block"
        BackButton.classList.add("slide_form_left")
    }

    function SauvgarderFunctionHide()
    {
        SauvgarderButton.style.display  =   "none"
        SauvgarderButton.classList.remove("slide_form_right")
    }

    function SubmitFunctionShow()
    {
        SubmitButton.style.display  =   "inline-block"
        SubmitButton.classList.add("slide_form_right")
    }

    function SubmitFunctionHide()
    {
        SubmitButton.style.display  =   "none"
        SubmitButton.classList.remove("slide_form_right")
    }

    function BackFunctionHide()
    {
        BackButton.style.display  =   "none"
        BackButton.classList.remove("slide_form_left")
    }

    function RemoveFunction()
    {
        let groupe_inputs

        if(InfoPOS_18.style.display == "block")
        {
            InitialiserElementsDansDiv("groupe_18_1")
        }

        if(InfoPOS_19.style.display == "block")
        {
            InitialiserElementsDansDiv("groupe_19_1")
        }

        if(InfoPOS_20.style.display == "block")
        {
            InitialiserElementsDansDiv("groupe_20_1")
        }

        if(Frigo_23.style.display   == "block")
        {
            InitialiserElementsDansDiv("groupe_23_1")
        }

        if(Plv_int_28.style.display == "block")
        {
            InitialiserElementsDansDiv("groupe_28_1")
        }

        if(Plv_ext_29.style.display == "block")
        {
            InitialiserElementsDansDiv("groupe_29_1")
        }

        if(Facing_31.style.display  == "block")
        {
            InitialiserElementsDansDiv("groupe_31_1")
        }

        if(Audit_22.style.display   == "block")
        {
            InitialiserElementsDansDiv("groupe_22_1")
        }

        if(Audit_26.style.display   == "block")
        {
            InitialiserElementsDansDiv("groupe_26_1")
        }

        if(Audit_30.style.display   == "block")
        {
            InitialiserElementsDansDiv("groupe_30_1")
        }

        if(Audit_34.style.display   == "block")
        {
            InitialiserElementsDansDiv("groupe_34_1")
        }

        if(Audit_35.style.display   == "block")
        {
            InitialiserElementsDansDiv("groupe_35_1")
        }

        if(Audit_36.style.display   == "block")
        {
            InitialiserElementsDansDiv("groupe_36_1")
        }

        if(Achat_33.style.display   == "block")
        {
            InitialiserElementsDansDiv("groupe_33_1")
        }

        if(Produit_42.style.display == "block")
        {
            InitialiserElementsDansDiv("groupe_42_1")
        }
    }

    function BackFunction() 
    {
        RemoveFunction()
        HideAll()
    }

    function SauvgarderFunction()
    {
        HideAll()
    }

    //

    function GetElementInsideContainer(containerID) {
        var elm = {};
        var elms = document.getElementById(containerID).getElementsByTagName("*");
        for (var i = 0; i < elms.length; i++) {
            if (elms[i].className === "form-group") {
                elm = elms[i];
                break;
            }
        }

        return elm;
    }

</script>