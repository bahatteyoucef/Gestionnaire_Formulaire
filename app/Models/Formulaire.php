<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Formulaire extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'formulaires';
    protected $primaryKey = 'id_formulaire';

    public function groupes()
    {
        return $this->belongsToMany('App\Models\Groupe','formulaires_groupes_questions','id_formulaire','id_groupe');
    }

    public function groupesG()
    {
        $groupesG       =   DB::table('groupes')
                                    ->join('formulaires_groupes_questions', 'formulaires_groupes_questions.id_groupe',    '='    , 'groupes.id_groupe')
                                    ->where('formulaires_groupes_questions.id_formulaire',$this->id_formulaire)
                                    ->distinct('groupes.id_groupe')
                                    ->groupBy('formulaires_groupes_questions.id_groupe')
                                    ->get();

        return $groupesG;
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question','formulaires_groupes_questions','id_formulaire','id_question');
    }

    public function reponses()
    {
        $reponses       =   DB::table('pos')
                                ->leftJoin('willayas'               , 'willayas.id_willaya'                     , '=' , 'pos.willaya')
                                ->leftJoin('communes'               , 'communes.id_commune'                     , '=' , 'pos.commune')
                                ->leftJoin('formulaires'            , 'formulaires.id_formulaire'               , '=' , 'pos.id_formulaire')
                                ->leftJoin('types_pos'              , 'types_pos.id_type_pos'                   , '=' , 'pos.type_de_magasin')
                                ->leftJoin('source_achats'          , 'source_achats.id_source_achat'           , '=' , 'pos.source_d\'achat')
                                ->leftJoin('zone_achalendages'      , 'zone_achalendages.id_zone_achalendage'   , '=' , 'pos.zone_d\'achalendage')
                                ->leftJoin('users'                  , 'users.id'                                , '=' , 'pos.id_enquetteur')
                                ->where('pos.id_formulaire',$this->id_formulaire)
                                ->get();
                                    
        return $reponses;
    }

}
