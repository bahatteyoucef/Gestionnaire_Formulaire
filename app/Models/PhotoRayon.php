<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoRayon extends Model
{
    use HasFactory;

    protected $guarded  =   [];

    protected $table        = 'photos_produits_rayon';
    protected $primaryKey   = 'id_photo_produits_rayon';
}
