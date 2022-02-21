<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facing extends Model
{
    use HasFactory;

    protected $guarded  =   [];

    protected $table = 'facings';
    protected $primaryKey = 'id_facing';

    public function pos()
    {
        return $this->belongsTo('App\Models\POS','id_pos','id_pos');
    }
}
