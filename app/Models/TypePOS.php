<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePOS extends Model
{
    use HasFactory;

    protected $table        = 'types_pos';
    protected $primaryKey   = 'id_type_pos';
}
