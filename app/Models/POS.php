<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class POS extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pos';
    protected $primaryKey = 'id_pos';
    
    public function plvInterieurs()
    {
        return $this->hasMany("App\Models\PLVInterieur","id_pos");
    }

    public function plvExterieurs()
    {
        return $this->hasMany("App\Models\PLVExterieur","id_pos");
    }

    public function facings()
    {
        return $this->hasMany("App\Models\Facing","id_pos");
    }

    public function achats()
    {
        return $this->hasMany("App\Models\AchatProduit","id_pos");
    }

    public function frigos()
    {
        return $this->hasMany("App\Models\Frigo","id_pos");
    }

    //Achats avec plus de detail
    public function AchatsDetails()
    {
        $achats       =   DB::table('achat_produits')
                                    ->leftjoin('pos'                            , 'pos.id_pos'                              ,    '='    , 'achat_produits.id_pos')
                                    ->leftjoin('types_produits'                 , 'types_produits.id_type_produit'          ,    '='    , 'achat_produits.type_de_produit_(achat)')
                                    ->leftjoin('marques'                        , 'marques.id_marque'                       ,    '='    , 'achat_produits.marque_de_produit_(achat)')
                                    ->leftjoin('source_achats'                  , 'source_achats.id_source_achat'           ,    '='    , 'achat_produits.source_achat')
                                    ->where('achat_produits.id_pos',$this->id_pos)
                                    ->get();

        return $achats;
    }
    // 

    //Facings avec plus de detail
    public function FacingsDetails()
    {
        $facings        =   DB::table('facings')
                                    ->leftjoin('pos'                            , 'pos.id_pos'                              ,    '='    , 'facings.id_pos')
                                    ->leftjoin('types_produits'                 , 'types_produits.id_type_produit'          ,    '='    , 'facings.type_de_produit_(facing)')
                                    ->leftjoin('marques'                        , 'marques.id_marque'                       ,    '='    , 'facings.marque_de_produit_(facing)')
                                    ->where('facings.id_pos',$this->id_pos)
                                    ->get();

        return $facings;
    }
    // 

    //Frigos avec plus de detail
    public function FrigosDetails()
    {
        $facings        =   DB::table('frigos')
                                    ->leftjoin('pos'                            , 'pos.id_pos'                              ,    '='    , 'frigos.id_pos')
                                    ->leftjoin('marques'                        , 'marques.id_marque'                       ,    '='    , 'frigos.model_frigo')
                                    ->where('frigos.id_pos',$this->id_pos)
                                    ->get();

        return $facings;
    }
    // 

    //PLVExterieur avec plus de detail
    public function PLVExterieurDetails()
    {
        $facings        =   DB::table('plv_exterieurs')
                                    ->leftjoin('pos'                            , 'pos.id_pos'                              ,    '='    , 'plv_exterieurs.id_pos')
                                    ->leftjoin('marques'                        , 'marques.id_marque'                       ,    '='    , 'plv_exterieurs.marque_sur_la_plv_exterieur')
                                    ->where('plv_exterieurs.id_pos',$this->id_pos)
                                    ->get();

        return $facings;
    }
    // 

    //PLVExterieur avec plus de detail
    public function PLVInterieurDetails()
    {
        $facings        =   DB::table('plv_interieurs')
                                    ->leftjoin('pos'                            , 'pos.id_pos'                              ,    '='    , 'plv_interieurs.id_pos')
                                    ->leftjoin('marques'                        , 'marques.id_marque'                       ,    '='    , 'plv_interieurs.marque_sur_la_plv_interieur')
                                    ->where('plv_interieurs.id_pos',$this->id_pos)
                                    ->get();

        return $facings;
    }
    // 

    //Stats
    public static function SelfServiceStats($id_question)
    {
        $query = '  select
                        count(nullif(`self_service`, 0)) as TotaleOui,
                        count(nullif(`self_service`, 1)) as TotaleNon
 
                    FROM    pos
        ';

        $data = DB::select($query , []);  

        return $data;       
    }
}
