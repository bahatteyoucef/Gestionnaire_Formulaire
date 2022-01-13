<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\GroupeQuestion;

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
}
