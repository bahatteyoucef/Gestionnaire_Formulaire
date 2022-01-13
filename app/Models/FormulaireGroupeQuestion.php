<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaireGroupeQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'formulaires_groupes_questions';
    protected $primaryKey = 'id_formulaire_groupe_question';

    public function formulaire()
    {
        
    }

    public function groupe()
    {

    }

    public function questions()
    {

    }
}
