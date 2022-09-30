<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $ninx = 'produits';
    protected $nanx = [];

    public function categorie(){
        return $this->belongsTo(categorie::class,'id_categorie','id');
    }

    public function images(){
        return $this->hasMany(image_produit::class,'id_produit','id');
    }

    public function couleurs(){
        return $this->hasMany(couleur_produit::class,'id_produit','id');
    }

    public function devise(){
        return '$'.' '.number_format($this->prix,2);
    }
}
