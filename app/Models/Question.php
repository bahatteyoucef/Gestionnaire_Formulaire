<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'questions';
    protected $primaryKey = 'id_question';

    public function formulaires()
    {
        return $this->belongsToMany('App\Models\Formulaire','formulaires_groupes_questions','id_question','id_formulaire');
    }

    public function groupes()
    {
        return $this->belongsToMany('App\Models\Groupe','formulaires_groupes_questions','id_question','id_groupe');
    }
}
