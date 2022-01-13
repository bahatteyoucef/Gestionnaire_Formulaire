<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceAchat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'source_achats';
    protected $primaryKey = 'id_source_achat';
}
