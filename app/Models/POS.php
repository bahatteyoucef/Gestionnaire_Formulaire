<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POS extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pos';
    protected $primaryKey = 'id_pos';
}
