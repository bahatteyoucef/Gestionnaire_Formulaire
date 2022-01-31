<?php

namespace App\Http\Controllers;

use App\Models\AchatProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\FormulaireGroupeQuestion;
use App\Models\Formulaire;
use App\Models\PLVExterieur;
use App\Models\PLVInterieur;
use App\Models\POS;
use App\Models\Facing;
use App\Models\Frigo;
use App\Models\PhotoRayon;

use App\Models\Question;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Exception;
use Throwable;

class POSController extends Controller
{
    public $url = 'Dashboard.POS.';

    public function index()
    {
        $poss =   POS::all();
        return view( $this->url . 'index')->with('poss',$poss);
    }

    public function create()
    {
        return view( $this->url . 'create');
    }

    public function show($id_formulaire)
    {
        $formulaire =   Formulaire::find($id_formulaire);

        if($formulaire)
        {
            return view( $this->url . 'show')->with('formulaire', $formulaire);
        }
        else
        {
            dd("not found");
        }
    }

    public function edit($id_formulaire)
    {
        return view( $this->url . 'edit');
    }

    public function update($id_formulaire)
    {
        return view( $this->url . 'update');
    }

    public function destroy($id_formulaire)
    {
        return view( $this->url . 'destroy');
    }

    public function store(Request $request)
    {
        // $this->validateStore($request);
        $this->StoreModels($request);

        return redirect('/');
    }

    public function validateStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id_formulaire"                     => "required",
            "Nom_de_POS"                        => "required",
            "Nom_proprietaire"                  => "required",
            "Numero_de_telephone_1"             => "required",
            "Numero_de_telephone_2"             => "required",
            "Repere_de_magasin"                 => "required",
            "Adresse_de_magasin"                => "required",
            "Quartier"                          => "required",
            "Willaya"                           => "required",
            "Commune"                           => "required",
            "Nombre_de_façade"                  => "required",
            "Zone_d'achalendage"                => "required",
            "Self_service"                      => "required",
            "Caise_automatique"                 => "required",
            "Comptoire_Caisse"                  => "required",
            "Type_de_Magasin"                   => "required",
            "Disponibilité_caisse_enregisteurse"=> "required",
            "Disponibilité_Frigo"               => "required",
            "Model_frigo"                       => "required",
            "Espace_de_stockage"                => "required",
            "Marque_sur_la_PLV_Interieur"       => "required",
            "Type_PLV_interieur"                => "required",
            "Type_PLV_exterieur"                => "required",
            "Marque_sur_la_PLV_Exterieur"       => "required",
            "Surface_de_magasin"                => "required",
            "Marque_de_produit_(Facing)"        => "required",
            "Type_de_produit_(Facing)"          => "required",
            "Prix"                              => "required",
            "Disponibilité__de_la_marque"       => "required",
            "Nombre_de_produit_(facing)"        => "required",
            "Marque_de_produit_(Achat)"         => "required",
            "Type_de_produit_(Achat)"           => "required",
            "Montant_d'achat"                   => "required",
            "Fréquence_d'achat"                 => "required",
            "Source_d'achat"                    => "required",
            "Nom_de_Grossiste"                  => "required",
            "Qte_vendu_par_Semaine"             => "required",
            "Qte_vendu_par_Jour"                => "required",
            "Quel_la_marque_la_plus_demander"   => "required",
            "Quel_est_le_produit_le_plus_vendu" => "required",
            "Conseil_ou_recomendation"          => "required",
        ]);

        $validator->sometimes("Nom_de_POS", 'required', function ($input) {
            return $this->validateAttribut("Nom_de_POS",$input->id_formulaire);
        });

        $validator->sometimes("Nom_proprietaire", 'required', function ($input) {
            return $this->validateAttribut("Nom_proprietaire",$input->id_formulaire);
        });

        $validator->sometimes("Numero_de_telephone_1", 'required', function ($input) {
            return $this->validateAttribut("Numero_de_telephone_1",$input->id_formulaire);
        });

        $validator->sometimes("Numero_de_telephone_2", 'required', function ($input) {
            return $this->validateAttribut("Numero_de_telephone_2",$input->id_formulaire);
        });

        $validator->sometimes("Repere_de_magasin", 'required', function ($input) {
            return $this->validateAttribut("Repere_de_magasin",$input->id_formulaire);
        });

        $validator->sometimes("Adresse_de_magasin", 'required', function ($input) {
            return $this->validateAttribut("Adresse_de_magasin",$input->id_formulaire);
        });

        $validator->sometimes("Quartier", 'required', function ($input) {
            return $this->validateAttribut("Quartier",$input->id_formulaire);
        });

        $validator->sometimes("Willaya", 'required', function ($input) {
            return $this->validateAttribut("Willaya",$input->id_formulaire);
        });

        $validator->sometimes("Commune", 'required', function ($input) {
            return $this->validateAttribut("Commune",$input->id_formulaire);
        });

        $validator->sometimes("Nombre_de_façade", 'required', function ($input) {
            return $this->validateAttribut("Nombre_de_façade",$input->id_formulaire);
        });

        $validator->sometimes("Zone_d'achalendage", 'required', function ($input) {
            return $this->validateAttribut("Zone_d'achalendage",$input->id_formulaire);
        });

        $validator->sometimes("Self_service", 'required', function ($input) {
            return $this->validateAttribut("Self_service",$input->id_formulaire);
        });

        $validator->sometimes("Caise_automatique", 'required', function ($input) {
            return $this->validateAttribut("Caise_automatique",$input->id_formulaire);
        });

        $validator->sometimes("Espace_de_stockage", 'required', function ($input) {
            return $this->validateAttribut("Espace_de_stockage",$input->id_formulaire);
        });

        $validator->sometimes("Model_frigo", 'required', function ($input) {
            return $this->validateAttribut("Model_frigo",$input->id_formulaire);
        });

        $validator->sometimes("Disponibilité_Frigo", 'required', function ($input) {
            return $this->validateAttribut("Disponibilité_Frigo",$input->id_formulaire);
        });

        $validator->sometimes("Disponibilité_caisse_enregisteurse", 'required', function ($input) {
            return $this->validateAttribut("Disponibilité_caisse_enregisteurse",$input->id_formulaire);
        });

        $validator->sometimes("Type_de_Magasin", 'required', function ($input) {
            return $this->validateAttribut("Type_de_Magasin",$input->id_formulaire);
        });

        $validator->sometimes("Comptoire_Caisse", 'required', function ($input) {
            return $this->validateAttribut("Comptoire_Caisse",$input->id_formulaire);
        });

        $validator->sometimes("Marque_de_produit_(Facing)", 'required', function ($input) {
            return $this->validateAttribut("Marque_de_produit_(Facing)",$input->id_formulaire);
        });

        $validator->sometimes("Surface_de_magasin", 'required', function ($input) {
            return $this->validateAttribut("Surface_de_magasin",$input->id_formulaire);
        });

        $validator->sometimes("Marque_sur_la_PLV_Exterieur", 'required', function ($input) {
            return $this->validateAttribut("Marque_sur_la_PLV_Exterieur",$input->id_formulaire);
        });

        $validator->sometimes("Type_PLV_exterieur", 'required', function ($input) {
            return $this->validateAttribut("Type_PLV_exterieur",$input->id_formulaire);
        });

        $validator->sometimes("Type_PLV_interieur", 'required', function ($input) {
            return $this->validateAttribut("Type_PLV_interieur",$input->id_formulaire);
        });

        $validator->sometimes("Marque_sur_la_PLV_Interieur", 'required', function ($input) {
            return $this->validateAttribut("Marque_sur_la_PLV_Interieur",$input->id_formulaire);
        });
    
        $validator->sometimes("Type_de_produit_(Achat)", 'required', function ($input) {
            return $this->validateAttribut("Type_de_produit_(Achat)",$input->id_formulaire);
        });

        $validator->sometimes("Marque_de_produit_(Achat)", 'required', function ($input) {
            return $this->validateAttribut("Marque_de_produit_(Achat)",$input->id_formulaire);
        });

        $validator->sometimes("Nombre_de_produit_(facing)", 'required', function ($input) {
            return $this->validateAttribut("Nombre_de_produit_(facing)",$input->id_formulaire);
        });

        $validator->sometimes("Disponibilité__de_la_marque", 'required', function ($input) {
            return $this->validateAttribut("Disponibilité__de_la_marque",$input->id_formulaire);
        });

        $validator->sometimes("Prix", 'required', function ($input) {
            return $this->validateAttribut("Prix",$input->id_formulaire);
        });

        $validator->sometimes("Type_de_produit_(Facing)", 'required', function ($input) {
            return $this->validateAttribut("Type_de_produit_(Facing)",$input->id_formulaire);
        });
    
        $validator->sometimes("Qte_vendu_par_Jour", 'required', function ($input) {
            return $this->validateAttribut("Qte_vendu_par_Jour",$input->id_formulaire);
        });

        $validator->sometimes("Qte_vendu_par_Semaine", 'required', function ($input) {
            return $this->validateAttribut("Qte_vendu_par_Semaine",$input->id_formulaire);
        });

        $validator->sometimes("Nom_de_Grossiste", 'required', function ($input) {
            return $this->validateAttribut("Nom_de_Grossiste",$input->id_formulaire);
        });

        $validator->sometimes("Source_d'achat", 'required', function ($input) {
            return $this->validateAttribut("Source_d'achat",$input->id_formulaire);
        });

        $validator->sometimes("Fréquence_d'achat", 'required', function ($input) {
            return $this->validateAttribut("Fréquence_d'achat",$input->id_formulaire);
        });

        $validator->sometimes("Montant_d'achat", 'required', function ($input) {
            return $this->validateAttribut("Montant_d'achat",$input->id_formulaire);
        });

        $validator->sometimes("Conseil_ou_recomendation", 'required', function ($input) {
            return $this->validateAttribut("Conseil_ou_recomendation",$input->id_formulaire);
        });

        $validator->sometimes("Quel_est_le_produit_le_plus_vendu", 'required', function ($input) {
            return $this->validateAttribut("Quel_est_le_produit_le_plus_vendu",$input->id_formulaire);
        });

        $validator->sometimes("Quel_la_marque_la_plus_demander", 'required', function ($input) {
            return $this->validateAttribut("Quel_la_marque_la_plus_demander",$input->id_formulaire);
        });

        if($validator->fails())
        {
            return back();
        }
        
    }

    public function StoreModels($request)
    {
        $id_pos  = $this->createPOS($request);
     
        $this->createPLVInterieur($request);        
        $this->createPLVExterieur($request);
        $this->createProduitFacing($request,$id_pos);
        $this->createProduitAchat($request,$id_pos);
        $this->createFrigo($request,$id_pos);
        $this->createPhotoRayon($request,$id_pos);
    }

    public function createPOS($request)
    {
        $POS            =   new POS;
        
        foreach ($request->except(['_token','submit']) as $key => $value) 
        {   
            if(     (strtolower($key) == "nom_de_pos")                          ||  (strtolower($key) == "repere_de_magasin")
                ||  (strtolower($key) == "nom_proprietaire")                    ||  (strtolower($key) == "adresse_de_magasin")
                ||  (strtolower($key) == "numero_de_telephone_1")               ||  (strtolower($key) == "quartier")
                ||  (strtolower($key) == "numero_de_telephone_2")               ||  (strtolower($key) == "willaya")
                ||  (strtolower($key) == "commune")                             ||  (strtolower($key) == "nombre_de_façade")
                ||  (strtolower($key) == "zone_d'achalendage")                  ||  (strtolower($key) == "self_service")
                ||  (strtolower($key) == "caise_automatique")                   ||  (strtolower($key) == "comptoire_caisse")
                ||  (strtolower($key) == "type_de_magasin")                     ||  (strtolower($key) == "disponibilité_caisse_enregisteurse")
                ||  (strtolower($key) == "disponibilité_frigo")                 ||  (strtolower($key) == "espace_de_stockage")
                ||  (strtolower($key) == "surface_de_magasin")                  ||  (strtolower($key) == "quel_la_marque_la_plus_demander")
                ||  (strtolower($key) == "quel_est_le_produit_le_plus_vendu")   ||  (strtolower($key) == "conseil_ou_recomendation"))
            {
                $key_attribut           =   strtolower($key);
                $POS->$key_attribut     =   $value;
            }
        }
        
        $POS->save();
        return $POS->id_pos;
    }

    public function createPLVInterieur($request)
    {
        $ajout                          =   false;
        
        $i                              =   0;
        $PLVInterieur                   =   new PLVInterieur;
        ${$PLVInterieur ."_". $i}       =   new PLVInterieur;
        
        $marque_sur_la_plv_interieur    =   "marque_sur_la_plv_interieur";
        $type_plv_interieur             =   "type_plv_interieur";
        $photo_plv_interieur            =   "photo_plv_interieur";

        foreach ($request->except(['_token','submit']) as $key => $value) 
        {   
            if  (       (Str::contains(strtolower($key), 'marque_sur_la_plv_interieur'))
                    ||  (Str::contains(strtolower($key), 'type_plv_interieur'))
                )
            {
                if  (   ($marque_sur_la_plv_interieur   ==  strtolower($key))
                    ||  ($type_plv_interieur            ==  strtolower($key))
                    )
                {
                    if(strstr(strtolower($key), "_".$i, true))
                    {
                        $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                    }

                    else
                    {
                        $key_attribut                               =   strtolower($key);
                    }

                    ${$PLVInterieur ."_". $i}->$key_attribut    =   $value;
                    $ajout                                      =   true;
                }

                else
                {
                    ${$PLVInterieur ."_". $i}->save();
                    $this->createPhotoPLVInterieur($request,$i,${$PLVInterieur ."_". $i});

                    if($i > 0)
                    {
                        $marque_sur_la_plv_interieur    =   strstr(strtolower($marque_sur_la_plv_interieur),"_".$i, true)   ."_".   $i+1;              
                        $type_plv_interieur             =   strstr(strtolower($type_plv_interieur),         "_".$i, true)   ."_".   $i+1;
                        $photo_plv_interieur            =   strstr(strtolower($photo_plv_interieur),        "_".$i, true)   ."_".   $i+1;
                    }
             
                    else
                    {
                        $marque_sur_la_plv_interieur    =   strtolower($marque_sur_la_plv_interieur)."_".   $i+1;              
                        $type_plv_interieur             =   strtolower($type_plv_interieur)         ."_".   $i+1;
                        $photo_plv_interieur            =   strtolower($photo_plv_interieur)        ."_".   $i+1;
                    }

                    $i                              =   $i+1;

                    ${$PLVInterieur ."_". $i}       =   new PLVInterieur;
                    
                    $key_attribut                               =   strstr(strtolower($key), "_".$i, true);                    
                    ${$PLVInterieur ."_". $i}->$key_attribut    =   $value;
                }
            }
        }

        if($ajout)
        {
            ${$PLVInterieur ."_". $i}->save();
            $this->createPhotoPLVInterieur($request,$i,${$PLVInterieur ."_". $i});
        }

    }

    public function createPLVExterieur($request)
    {
        $ajout                          =   false;

        $i                              =   0;
        $PLVExterieur                   =   new PLVExterieur;
        ${$PLVExterieur ."_". $i}       =   new PLVExterieur;
        
        $marque_sur_la_plv_exterieur    =   "marque_sur_la_plv_exterieur";
        $type_plv_exterieur             =   "type_plv_exterieur";
        $photo_plv_exterieur            =   "photo_plv_exterieur";

        foreach ($request->except(['_token','submit']) as $key => $value) 
        {   
            if  (       (Str::contains(strtolower($key), 'marque_sur_la_plv_exterieur'))
                    ||  (Str::contains(strtolower($key), 'type_plv_exterieur'))
                )
            {
                if  (   ($marque_sur_la_plv_exterieur   ==  strtolower($key))
                    ||  ($type_plv_exterieur            ==  strtolower($key))
                    )
                {
                    if(strstr(strtolower($key), "_".$i, true))
                    {
                        $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                    }

                    else
                    {
                        $key_attribut                               =   strtolower($key);
                    }

                    ${$PLVExterieur ."_". $i}->$key_attribut    =   $value;
                    $ajout                                      =   true;
                }

                else
                {
                    ${$PLVExterieur ."_". $i}->save();
                    $this->createPhotoPLVExterieur($request,$i,${$PLVExterieur ."_". $i});
                     
                    if($i > 0)
                    {
                        $marque_sur_la_plv_exterieur    =   strstr(strtolower($marque_sur_la_plv_exterieur),"_".$i, true)   ."_".   $i+1;              
                        $type_plv_exterieur             =   strstr(strtolower($type_plv_exterieur),         "_".$i, true)   ."_".   $i+1;
                        $photo_plv_exterieur            =   strstr(strtolower($photo_plv_exterieur),        "_".$i, true)   ."_".   $i+1;
                    }

                    else
                    {
                        $marque_sur_la_plv_exterieur    =   strtolower($marque_sur_la_plv_exterieur)."_".   $i+1;              
                        $type_plv_exterieur             =   strtolower($type_plv_exterieur)         ."_".   $i+1;
                        $photo_plv_exterieur            =   strtolower($photo_plv_exterieur)        ."_".   $i+1;
                    }

                    $i                              =   $i+1;

                    ${$PLVExterieur ."_". $i}                   =   new PLVExterieur();
                    
                    $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                    ${$PLVExterieur ."_". $i}->$key_attribut    =   $value;
                }
            }
        }

        if($ajout)
        {
            ${$PLVExterieur ."_". $i}->save();
            $this->createPhotoPLVExterieur($request,$i,${$PLVExterieur ."_". $i});
        }

    }

    public function createProduitFacing($request,$id_pos)
    {
        $ajout                              =   false;

        $i                                  =   0;
        $facing                             =   new Facing;
        ${$facing ."_". $i}                 =   new Facing;

        $marque_de_produit_facing           =   "marque_de_produit_(facing)";
        $type_de_produit_facing             =   "type_de_produit_(facing)";
        $prix                               =   "prix";
        $disponibilité__de_la_marque        =   "disponibilité__de_la_marque";
        $nombre_de_produit_facing           =   "nombre_de_produit_(facing)";
        $photo_facing                       =   "photo_facing";

        foreach ($request->except(['_token','submit']) as $key => $value) 
        {   
            if  (       (Str::contains(strtolower($key), "marque_de_produit_(facing)"))
                    ||  (Str::contains(strtolower($key), "type_de_produit_(facing)"))
                    ||  (Str::contains(strtolower($key), "prix"))
                    ||  (Str::contains(strtolower($key), "disponibilité__de_la_marque"))
                    ||  (Str::contains(strtolower($key), "nombre_de_produit_(facing)"))
                )
            {
                if  (   ($marque_de_produit_facing      ==  strtolower($key))
                    ||  ($type_de_produit_facing        ==  strtolower($key))
                    ||  ($prix                          ==  strtolower($key))
                    ||  ($disponibilité__de_la_marque   ==  strtolower($key))
                    ||  ($nombre_de_produit_facing      ==  strtolower($key)))
                {
                    if(strstr(strtolower($key), "_".$i, true))
                    {
                        $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                    }

                    else
                    {
                        $key_attribut                               =   strtolower($key);
                    }

                    ${$facing ."_". $i}->$key_attribut      =   $value;
                    $ajout                                  =   true;
                }

                else
                {
                    ${$facing ."_". $i}->id_pos =   $id_pos;
                    ${$facing ."_". $i}->save();
                    $this->createPhotoFacing($request,$i,${$facing ."_". $i});                 

                    if($i > 0)
                    {
                        $marque_de_produit_facing       =   strstr(strtolower($marque_de_produit_facing), "_".$i, true)     ."_".   $i+1;              
                        $type_de_produit_facing         =   strstr(strtolower($type_de_produit_facing), "_".$i, true)       ."_".   $i+1;
                        $prix                           =   strstr(strtolower($prix), "_".$i, true)                         ."_".   $i+1;
                        $disponibilité__de_la_marque    =   strstr(strtolower($disponibilité__de_la_marque), "_".$i, true)  ."_".   $i+1;              
                        $nombre_de_produit_facing       =   strstr(strtolower($nombre_de_produit_facing), "_".$i, true)     ."_".   $i+1;
                        $photo_facing                   =   strstr(strtolower($photo_facing), "_".$i, true)                 ."_".   $i+1;
                    }
             
                    else
                    {
                        $marque_de_produit_facing       =   strtolower($marque_de_produit_facing)       ."_".   $i+1;              
                        $type_de_produit_facing         =   strtolower($type_de_produit_facing)         ."_".   $i+1;
                        $prix                           =   strtolower($prix)                           ."_".   $i+1;
                        $disponibilité__de_la_marque    =   strtolower($disponibilité__de_la_marque)    ."_".   $i+1;              
                        $nombre_de_produit_facing       =   strtolower($nombre_de_produit_facing)       ."_".   $i+1;
                        $photo_facing                   =   strtolower($photo_facing)                   ."_".   $i+1;
                    }

                    $i                                      =   $i+1;

                    ${$facing ."_". $i}                     =   new Facing();

                    $key_attribut                           =   strstr(strtolower($key), "_".$i, true);

                    ${$facing ."_". $i}->$key_attribut      =   $value;
                }
            }
        }

        if($ajout)
        {
            ${$facing ."_". $i}->id_pos =   $id_pos;
            ${$facing ."_". $i}->save();
            $this->createPhotoFacing($request,$i,${$facing ."_". $i});                 
        }
    }

    public function createProduitAchat($request,$id_pos)
    {
        $ajout                              =   false;

        $i                                  =   0;
        $achatProduit                       =   new AchatProduit;
        ${$achatProduit ."_". $i}           =   new AchatProduit;
        
        $marque_de_produit_Achat            =   "marque_de_produit_(achat)";
        $type_de_produit_Achat              =   "type_de_produit_(achat)";
        $montant_dachat                     =   "montant_d'achat";
        $fréquence_dachat                   =   "fréquence_d'achat";
        $source_dachat                      =   "source_d'achat";
        $nom_de_Grossiste                   =   "nom_de_grossiste";
        $qte_vendu_par_semaine              =   "qte_vendu_par_semaine";
        $qte_vendu_par_jour                 =   "qte_vendu_par_jour";

        foreach ($request->except(['_token','submit']) as $key => $value) 
        {   
        
            if(     (Str::contains(strtolower($key), "marque_de_produit_(achat)"))  ||  (Str::contains(strtolower($key), "type_de_produit_(achat)"))
                ||  (Str::contains(strtolower($key), "montant_d'achat"))            ||  (Str::contains(strtolower($key), "fréquence_d'achat"))
                ||  (Str::contains(strtolower($key), "source_d'achat"))             ||  (Str::contains(strtolower($key), "nom_de_grossiste")) 
                ||  (Str::contains(strtolower($key), "qte_vendu_par_semaine"))      ||  (Str::contains(strtolower($key), "qte_vendu_par_jour")) )
            {
                if  (   ($marque_de_produit_Achat       ==  strtolower($key))
                    ||  ($type_de_produit_Achat         ==  strtolower($key))
                    ||  ($montant_dachat                ==  strtolower($key))
                    ||  ($fréquence_dachat              ==  strtolower($key))
                    ||  ($source_dachat                 ==  strtolower($key))
                    ||  ($nom_de_Grossiste              ==  strtolower($key))
                    ||  ($qte_vendu_par_semaine         ==  strtolower($key))
                    ||  ($qte_vendu_par_jour            ==  strtolower($key)))
                {
                    if(strstr(strtolower($key), "_".$i, true))
                    {
                        $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                    }

                    else
                    {
                        $key_attribut                               =   strtolower($key);
                    }

                    ${$achatProduit ."_". $i}->$key_attribut        =   $value;
                    $ajout                                          =   true;
                }

                else
                {
                    ${$achatProduit ."_". $i}->id_pos  =   $id_pos;
                    ${$achatProduit ."_". $i}->save();

                    if($i > 0)
                    {
                        $marque_de_produit_Achat    =   strstr(strtolower($marque_de_produit_Achat), "_".$i, true)  ."_".   $i+1;              
                        $type_de_produit_Achat      =   strstr(strtolower($type_de_produit_Achat), "_".$i, true)    ."_".   $i+1;
                        $montant_dachat             =   strstr(strtolower($montant_dachat), "_".$i, true)           ."_".   $i+1;
                        $fréquence_dachat           =   strstr(strtolower($fréquence_dachat), "_".$i, true)         ."_".   $i+1;              
                        $source_dachat              =   strstr(strtolower($source_dachat), "_".$i, true)            ."_".   $i+1;
                        $nom_de_Grossiste           =   strstr(strtolower($nom_de_Grossiste), "_".$i, true)         ."_".   $i+1;
                        $qte_vendu_par_semaine      =   strtolower($qte_vendu_par_semaine)                          ."_".   $i+1;              
                        $qte_vendu_par_jour         =   strtolower($qte_vendu_par_jour)                             ."_".   $i+1;
                    }
             
                    else
                    {
                        $marque_de_produit_Achat    =   strtolower($marque_de_produit_Achat)    ."_".   $i+1;              
                        $type_de_produit_Achat      =   strtolower($type_de_produit_Achat)      ."_".   $i+1;
                        $montant_dachat             =   strtolower($montant_dachat)             ."_".   $i+1;
                        $fréquence_dachat           =   strtolower($fréquence_dachat)           ."_".   $i+1;              
                        $source_dachat              =   strtolower($source_dachat)              ."_".   $i+1;
                        $nom_de_Grossiste           =   strtolower($nom_de_Grossiste)           ."_".   $i+1;
                        $qte_vendu_par_semaine      =   strtolower($qte_vendu_par_semaine)      ."_".   $i+1;              
                        $qte_vendu_par_jour         =   strtolower($qte_vendu_par_jour)         ."_".   $i+1;
                    }

                    $i                              =   $i+1;

                    ${$achatProduit ."_". $i}                   =   new AchatProduit();
                    
                    $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                    ${$achatProduit ."_". $i}->$key_attribut    =   $value;
                }
            }
        }

        if($ajout)
        {
            ${$achatProduit ."_". $i}->id_pos  =   $id_pos;
            ${$achatProduit ."_". $i}->save();
        }
    }

    public function createFrigo($request,$id_pos)
    {
        $i                                  =   0;
        $ajout                              =   false;

        $frigo                              =   new Frigo;
        ${$frigo ."_". $i}                  =   new Frigo;
        
        $model_frigo                        =   "model_frigo";
        $Disponibilité_frigo                =   "Disponibilité_Frigo";

        foreach ($request->except(['_token','submit']) as $key => $value) 
        {           
            if( (Str::contains(strtolower($key), "model_frigo"))&&
                ($request->get($Disponibilité_frigo) == 1))
            {
                if($model_frigo   ==  strtolower($key))
                {
                    if(strstr(strtolower($key), "_".$i, true))
                    {
                        $key_attribut                        =   strstr(strtolower($key), "_".$i, true);
                    }

                    else
                    {
                        $key_attribut                        =   strtolower($key);
                    }

                    ${$frigo ."_". $i}->$key_attribut        =   $value;
                    $ajout                                   =   true;
                }

                else
                {
                    if($ajout == true)
                    {
                        ${$frigo ."_". $i}->id_pos  =   $id_pos;
                        ${$frigo ."_". $i}->save();
                        $this->createPhotoFrigo($request,$i,${$frigo ."_". $i});

                        if($i > 0)
                        {
                            $model_frigo            =   strstr(strtolower($model_frigo), "_".$i, true)          ."_".   $i+1;              
                            $Disponibilité_frigo    =   strstr(strtolower($Disponibilité_frigo), "_".$i, true)  ."_".   $i+1;
                        }
                
                        else
                        {
                            $model_frigo            =   strtolower($model_frigo)            ."_".   $i+1;              
                            $Disponibilité_frigo    =   strtolower($Disponibilité_frigo)    ."_".   $i+1;
                        }

                        $i                              =   $i+1;

                        ${$frigo ."_". $i}                          =   new Frigo();
                        
                        $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                        ${$frigo ."_". $i}->$key_attribut           =   $value;
                    }
                }
            }
        }
    
        if($ajout)
        {
            ${$frigo ."_". $i}->id_pos  =   $id_pos;
            ${$frigo ."_". $i}->save();
            $this->createPhotoFrigo($request,$i,${$frigo ."_". $i});
        }
    }

    //Photo
    public function createPhotoRayon($request,$id_pos)
    {
        if($request->hasFile('Photo_des_produits_sur_rayon'))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            $files = $request->file('Photo_des_produits_sur_rayon');
            
            foreach($files as $file)
            {
                $filename   =   $file->getClientOriginalName();
                $extension  =   $file->getClientOriginalExtension();

                $check=in_array($extension,$allowedfileExtension);

                $filename = $file->store('Photos_des_produits_sur_rayon');
                
                PhotoRayon::create([
                    'url_photo_produits_sur_rayon'  =>  $filename,
                    'id_pos'                        =>  $id_pos
                ]);
                
            }
        }
    }

    public function createPhotoPLVInterieur($request,$i,$plv_interieur)
    {
        if(($request->hasFile('Photo_PLV_interieur'."_".$i))&&($i>0))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $file = $request->file('Photo_PLV_interieur'."_".$i);
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check=in_array($extension,$allowedfileExtension);

            $filename   =   $request->Photo_PLV_interieur->storeAs("Photo_PLV_interieur", uniqid().$filename);
            $plv_interieur->photo_plv_interieur  =  $filename;
            $plv_interieur->save();
        }

        if(($request->hasFile('Photo_PLV_interieur'))&&($i==0))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $file = $request->file('Photo_PLV_interieur');
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check=in_array($extension,$allowedfileExtension);

            $filename       =   $request->Photo_PLV_interieur->storeAs("Photo_PLV_interieur", uniqid().$filename);

            $plv_interieur->photo_plv_interieur  =  $filename;
            $plv_interieur->save();
        }
    }

    public function createPhotoPLVExterieur($request,$i,$plv_exterieur)
    {
        if(($request->hasFile('Photo_PLV_exterieur'."_".$i))&&($i>0))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $file = $request->file('Photo_PLV_exterieur'."_".$i);
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check=in_array($extension,$allowedfileExtension);

            $filename   =   $request->Photo_PLV_exterieur->storeAs("Photo_PLV_exterieur", uniqid().$filename);
            $plv_exterieur->photo_plv_interieur =   $filename;
            $plv_exterieur->save();
        }

        if(($request->hasFile('Photo_PLV_exterieur'))&&($i==0))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $file = $request->file('Photo_PLV_exterieur');
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check=in_array($extension,$allowedfileExtension);

            $filename   =   $request->Photo_PLV_exterieur->storeAs("Photo_PLV_exterieur", uniqid().$filename);
            $plv_exterieur->photo_plv_interieur =   $filename;
            $plv_exterieur->save();
        }
    }

    public function createPhotoFacing($request,$i,$facing)
    {
        if(($request->hasFile('Photo_facing'."_".$i))&&($i>0))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $file = $request->file('Photo_facing'."_".$i);
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check=in_array($extension,$allowedfileExtension);

            $filename   =   $request->Photo_facing->storeAs("Photo_du_facing", uniqid().$filename);
            
            $facing->photo_facing   =   $filename;
            $facing->save();
        }

        if(($request->hasFile('Photo_facing'))&&($i==0))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $file = $request->file('Photo_facing');
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check  =   in_array($extension,$allowedfileExtension);

            $filename               =   $request->Photo_facing->storeAs("Photo_du_facing", uniqid().$filename);
            
            $facing->photo_facing   =   $filename;
            $facing->save();
        }
    }

    public function createPhotoFrigo($request,$i,$frigo)
    {
        if(($request->hasFile('Photo_du_frigo'."_".$i))&&($i>0))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $file = $request->file('Photo_du_frigo'."_".$i);
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check=in_array($extension,$allowedfileExtension);

            $filename   =   $request->Photo_du_frigo->storeAs("Photo_du_frigo", uniqid().$filename);
            
            $frigo->photo_du_frigo  =   $filename;
            $frigo->save();
        }

        if(($request->hasFile('Photo_du_frigo'))&&($i==0))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            
            $file = $request->file('Photo_du_frigo');
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check=in_array($extension,$allowedfileExtension);

            $filename   =   $request->Photo_du_frigo->storeAs("Photo_du_frigo", uniqid().$filename);
            
            $frigo->photo_du_frigo  =   $filename;
            $frigo->save();
        }
    }

    //

    //Validate Request

    public function validateAttribut($attribut,$id_formulaire)
    {
        $question_description   =   str_replace('_', ' ', $attribut);

        $questions              =   Question::all();
        $question_test          =   new Question;

        foreach ($questions as $question) 
        {
            if(Str::contains($question->description_question, $question_description))
            {
                $question_test  =   $question;
                break;
            }
        }

        $formulaire_question    =   FormulaireGroupeQuestion::where([
            ['id_formulaire'    ,'=',   $id_formulaire],
            ['id_question'      ,'=',   $question_test->id_question]
        ])->get()->first();

        return (($formulaire_question != null)&&($formulaire_question->obligatoire_question == 1));
    } 

    //

}
