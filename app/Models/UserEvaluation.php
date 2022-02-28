<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvaluation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'user_evaluations';
    protected $primaryKey = 'id_user_evaluation';
}
