<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPOS extends Model
{
    use HasFactory;

    protected $table        = 'users_pos';
    protected $primaryKey   = 'id_user_pos';

    protected $fillable = [
        'id_user',
        'id_pos',
        'id_formulaire'
    ];

    public function POS()
    {
        
    }
}
