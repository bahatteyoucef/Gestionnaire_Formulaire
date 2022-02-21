<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLVInterieur extends Model
{
    use HasFactory;

    protected $guarded  =   [];

    protected $table        = 'plv_interieurs';
    protected $primaryKey   = 'id_plv_int';

    public function pos()
    {
        return $this->belongsTo('App\Models\POS','id_pos','id_pos');
    }
}
