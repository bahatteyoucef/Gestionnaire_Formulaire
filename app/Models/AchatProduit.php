<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatProduit extends Model
{
    use HasFactory;

    protected $guarded  =   [];

    protected $table = 'achat_produits';
    protected $primaryKey = 'id_achat_produit';

    public function pos()
    {
        return $this->belongsTo('App\Models\POS','id_pos','id_pos');
    }
}
