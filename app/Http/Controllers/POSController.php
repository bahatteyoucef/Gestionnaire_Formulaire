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

use Illuminate\Support\Str;

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

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
            // 'Nom_de_POS'                    => 'required',
            // 'nom_gerant'                    => 'required',            
            // 'nom_proprietaire_pos'          => 'required',
            // 'num_proprietaire_pos'          => 'required',      
            // 'latitude_pos'                  => 'required',
            // 'longitude_pos'                 => 'required',
            // 'superficie_pos'                => 'required',
            // 'point_repere_pos'              => 'required',
            // 'nombre_facade_pos'             => 'required',
            // 'caisse_enregistrement_pos'     => 'required',
            // 'frequence_achat_pos'           => 'required',
            // 'classification_pos'            => 'required',
            // 'stock_chaud_boisson_pos'       => 'required',
            // 'etat_POS'                      => 'required',
        // ]);

        // $validator->sometimes('Nom_de_POS', 'required', function ($input) {
        //     return $input->Nom_de_POS != null;
        // });

        $this->StoreModels($request);

        // if($validator->fails())
        // {        
            //return with errors    
        //     return back();
        // }

        // return redirect('/');
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

    public function StoreModels($request)
    {
        $this->createPOS($request);
        $this->createPLVInterieur($request);        
        $this->createPLVExterieur($request);
        $this->createProduitFacing($request);
        $this->createProduitAchat($request);
        // $this->createFrigo($request);
        $this->createPhotoRayon($request);
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
                    ||  (Str::contains(strtolower($key), 'photo_plv_interieur'))
                )
            {
                if  (   ($marque_sur_la_plv_interieur   ==  strtolower($key))
                    ||  ($type_plv_interieur            ==  strtolower($key))
                    ||  ($photo_plv_interieur           ==  strtolower($key)))
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
                        
                    $i                              =   $i+1;

                    $marque_sur_la_plv_interieur    =   $marque_sur_la_plv_interieur."_".   $i;              
                    $type_plv_interieur             =   $type_plv_interieur         ."_".   $i;
                    $photo_plv_interieur            =   $photo_plv_interieur        ."_".   $i;

                    ${$PLVInterieur ."_". $i}       =   new PLVInterieur;
                    
                    $key_attribut                               =   strstr(strtolower($key), "_".$i, true);                    
                    ${$PLVInterieur ."_". $i}->$key_attribut    =   $value;
                }
            }
        }

        if($ajout)
        {
            ${$PLVInterieur ."_". $i}->save();
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
                    ||  (Str::contains(strtolower($key), 'photo_plv_exterieur'))
                )
            {
                if  (   ($marque_sur_la_plv_exterieur   ==  strtolower($key))
                    ||  ($type_plv_exterieur            ==  strtolower($key))
                    ||  ($photo_plv_exterieur           ==  strtolower($key)))
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
                        
                    $i                              =   $i+1;

                    $marque_sur_la_plv_exterieur    =   $marque_sur_la_plv_exterieur."_".   $i;              
                    $type_plv_exterieur             =   $type_plv_exterieur         ."_".   $i;
                    $photo_plv_exterieur            =   $photo_plv_exterieur        ."_".   $i;

                    ${$PLVExterieur ."_". $i}                   =   new PLVExterieur();
                    
                    $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                    ${$PLVExterieur ."_". $i}->$key_attribut    =   $value;
                }
            }
        }

        if($ajout)
        {
            ${$PLVExterieur ."_". $i}->save();
        }

    }

    public function createProduitFacing($request)
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
                    ||  (Str::contains(strtolower($key), "photo_facing"))
                )
            {
                if  (   ($marque_de_produit_facing      ==  strtolower($key))
                    ||  ($type_de_produit_facing        ==  strtolower($key))
                    ||  ($prix                          ==  strtolower($key))
                    ||  ($disponibilité__de_la_marque   ==  strtolower($key))
                    ||  ($nombre_de_produit_facing      ==  strtolower($key))
                    ||  ($photo_facing                  ==  strtolower($key)))
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
                    ${$facing ."_". $i}->save();
                        
                    $i                              =   $i+1;

                    $marque_de_produit_facing       =   $marque_de_produit_facing       ."_".   $i;              
                    $type_de_produit_facing         =   $type_de_produit_facing         ."_".   $i;
                    $prix                           =   $prix                           ."_".   $i;
                    $disponibilité__de_la_marque    =   $disponibilité__de_la_marque    ."_".   $i;              
                    $nombre_de_produit_facing       =   $nombre_de_produit_facing       ."_".   $i;
                    $photo_facing                   =   $photo_facing                   ."_".   $i;

                    ${$facing ."_". $i}                     =   new Facing();
                    
                    $key_attribut                           =   strstr(strtolower($key), "_".$i, true);
                    ${$facing ."_". $i}->$key_attribut      =   $value;
                }
            }
        }

        if($ajout)
        {
            ${$facing ."_". $i}->save();
        }

    }

    public function createFrigo($request)
    {
        // if((strtolower($key) == "disponibilité_frigo"))
        // {
        //     $key_attribut           =   strtolower($key);
        //     $frigo->$key_attribut   =   $value;
        // }

        // return $frigo;
    }

    public function createProduitAchat($request)
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
        
            if(     (strtolower($key) == "marque_de_produit_(achat)")       ||  (strtolower($key) == "type_de_produit_(achat)")
                ||  (strtolower($key) == "montant_d'achat")                 ||  (strtolower($key) == "fréquence_d'achat")
                ||  (strtolower($key) == "source_d'achat")                  ||  (strtolower($key) == "qte_vendu_par_jour")
                ||  (strtolower($key) == "nom_de_grossiste")                ||  (strtolower($key) == "qte_vendu_par_semaine"))
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
                    ${$achatProduit ."_". $i}->save();
                        
                    $i                              =   $i+1;

                    $marque_de_produit_Achat        =   $marque_de_produit_Achat    ."_".   $i;              
                    $type_de_produit_Achat          =   $type_de_produit_Achat      ."_".   $i;
                    $montant_dachat                 =   $montant_dachat             ."_".   $i;
                    $fréquence_dachat               =   $fréquence_dachat           ."_".   $i;              
                    $source_dachat                  =   $source_dachat              ."_".   $i;
                    $nom_de_Grossiste               =   $nom_de_Grossiste           ."_".   $i;
                    $qte_vendu_par_semaine          =   $qte_vendu_par_semaine      ."_".   $i;
                    $qte_vendu_par_jour             =   $qte_vendu_par_jour         ."_".   $i;

                    ${$achatProduit ."_". $i}                   =   new AchatProduit();
                    
                    $key_attribut                               =   strstr(strtolower($key), "_".$i, true);
                    ${$achatProduit ."_". $i}->$key_attribut    =   $value;
                }
            }
        }

        if($ajout)
        {
            ${$achatProduit ."_". $i}->save();
        }

    }

    public function createPhotoRayon($request)
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

                foreach ($request->Photo_des_produits_sur_rayon as $Photo_des_produits_sur_rayon) 
                {
                    $filename = $Photo_des_produits_sur_rayon->store('Photos_des_produits_sur_rayon');
                    
                    PhotoRayon::create([
                        'url_photo_produits_sur_rayon'  =>  $filename
                    ]);
                }
            }
        }
    }
}
