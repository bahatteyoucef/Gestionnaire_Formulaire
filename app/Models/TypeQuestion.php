<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'types_questions';
    protected $primaryKey = 'id_type_question';

}
