<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaireGroupe extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'formulaires_groupes';
    protected $primaryKey = 'id_formulaire_grp_qst';

    public function formulaire()
    {
        return $this->belongsTo('App\Formulaire','id_formulaire','id_formulaire');
    }

    public function groupe()
    {
        return $this->belongsTo('App\Groupe','id_grp_qst','id_grp_qst');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question','groupes_questions','id_formulaire_groupe','id_question');
    }
}
