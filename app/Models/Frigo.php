<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frigo extends Model
{
    use HasFactory;

    protected $guarded  =   [];

    protected $table = 'frigos';
    protected $primaryKey = 'id_frigo';
}
