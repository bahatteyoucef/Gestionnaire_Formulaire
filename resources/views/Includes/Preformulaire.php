<script type="text/javascript">

        var MobileDivs

        var InfoPOS_18
        var InfoPOS_19
        var InfoPOS_20

        var Frigo_23  

        var plv_int_28
        var plv_ext_29

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
        var SubmitButton

    // Mobile Functions 
    document.addEventListener("DOMContentLoaded", function(event) { 
        Initialisation()
        HideAll()

        document.getElementById("back").addEventListener("click", BackFunction);
        document.getElementById("sauvgarder").addEventListener("click", SauvgarderFunction);
    })

    function Initialisation()
    {
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

        BackButton          =   document.getElementById("back")
        SauvgarderButton    =   document.getElementById("sauvgarder")
        SubmitButton        =   document.getElementById("submit")
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

        ButtonsFunctionHide()
        SubmitFunctionShow()
        MobileDivsShow()
    }

    function MobileDivsShow()
    {
        MobileDivs.style.removeProperty('display');

        ButtonsFunctionHide()
        SubmitFunctionShow()
    }

    function MobileDivsHide()
    {
        MobileDivs.style.display    =   "none"

        ButtonsFunctionShow()
        SubmitFunctionHide()
    }

    function InfoPOSFunctionShow()
    {
        MobileDivsHide()

        InfoPOS_18.style.display    =   "block"
        InfoPOS_19.style.display    =   "block"      
        InfoPOS_20.style.display    =   "block"

        ButtonsFunctionShow()
        SubmitFunctionHide()
    }

    function InfoPOSFunctionHide()
    {
        MobileDivsShow()

        InfoPOS_18.style.display    =   "none"
        InfoPOS_19.style.display    =   "none"      
        InfoPOS_20.style.display    =   "none"

        ButtonsFunctionHide()
        SubmitFunctionShow()
    }

    function AchatsFunctionShow()
    {
        MobileDivsHide()

        Achat_33.style.display      =   "block"

        ButtonsFunctionShow()
        SubmitFunctionHide()
    }
    
    function AchatsFunctionHide()
    {
        MobileDivsShow()

        Achat_33.style.display      =   "none"

        ButtonsFunctionHide()
        SubmitFunctionShow()
    }

    function FrigosFunctionShow()
    {
        MobileDivsHide()

        Frigo_23.style.display      =   "block"

        ButtonsFunctionShow()
        SubmitFunctionHide()
    }

    function FrigosFunctionHide()
    {
        MobileDivsShow()

        Frigo_23.style.display      =   "none"

        ButtonsFunctionHide()
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

        ButtonsFunctionShow()
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

        ButtonsFunctionHide()
        SubmitFunctionShow()
    }

    function PLVExterieursFunctionShow()
    {
        MobileDivsHide()

        Plv_ext_29.style.display    =   "block"

        ButtonsFunctionShow()
        SubmitFunctionHide()
    }
    
    function PLVExterieursFunctionHide()
    {
        MobileDivsShow()

        Plv_ext_29.style.display    =   "none"

        ButtonsFunctionHide()
        SubmitFunctionShow()
    }

    function PLVInterieursFunctionShow()
    {
        MobileDivsHide()

        Plv_int_28.style.display    =   "block"

        ButtonsFunctionShow()
        SubmitFunctionHide()
    }

    function PLVInterieursFunctionHide()
    {
        MobileDivsShow()

        Plv_int_28.style.display    =   "none"

        ButtonsFunctionHide()
        SubmitFunctionShow()
    }

    function ProduitsFunctionShow()
    {
        MobileDivsHide()

        Produit_42.style.display    =   "block"
       
        ButtonsFunctionShow()
        SubmitFunctionHide()
    }

    function ProduitsFunctionHide()
    {
        MobileDivsShow()

        Produit_42.style.display    =   "none"

        ButtonsFunctionHide()
        SubmitFunctionShow()
    }

    function FacingsFunctionShow()
    {
        MobileDivsHide()

        Facing_31.style.display     =   "block"
        
        ButtonsFunctionShow()
        SubmitFunctionHide()
    }

    function FacingsFunctionHide()
    {
        MobileDivsShow()

        Facing_31.style.display     =   "none"

        ButtonsFunctionHide()
        SubmitFunctionShow()
    }

    function ButtonsFunctionShow()
    {
        BackButton.style.display        =   "inline-block"
        SauvgarderButton.style.display  =   "inline-block"
    }

    function ButtonsFunctionHide()
    {
        BackButton.style.display        =   "none"
        SauvgarderButton.style.display  =   "none"
    }

    function SubmitFunctionShow()
    {
        SubmitButton.style.display  =   "inline-block"
    }

    function SubmitFunctionHide()
    {
        SubmitButton.style.display  =   "none"
    }

    function BackFunction() 
    {
        RemoveFunction()
        HideAll()
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

    function SauvgarderFunction()
    {
        HideAll()
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

</script>