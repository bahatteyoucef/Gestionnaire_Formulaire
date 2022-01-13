<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneAchalendage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'zone_achalendages';
    protected $primaryKey = 'id_zone_achalendage';

}
