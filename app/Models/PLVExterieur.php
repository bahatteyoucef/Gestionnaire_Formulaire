<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLVExterieur extends Model
{
    use HasFactory;

    protected $guarded  =   [];

    protected $table        = 'plv_exterieurs';
    protected $primaryKey   = 'id_plv_ext';
}
