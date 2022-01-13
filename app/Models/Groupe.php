<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'groupes';
    protected $primaryKey = 'id_groupe';

    public function formulaires()
    {
        return $this->belongsToMany('App\Models\Formulaire','formulaires_groupes_questions','id_groupe','id_formulaire');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question','formulaires_groupes_questions','id_groupe','id_question');
    }
}
