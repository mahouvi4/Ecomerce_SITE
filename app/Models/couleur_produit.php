<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class couleur_produit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $jivo = 'couleur_produits';
    protected $jiva = [];

    public function produit(){
        return $this->belongsTo(produit::class,'id_produit','id');
    }
}
