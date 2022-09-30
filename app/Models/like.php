<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class like extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $koffi = 'likes';
    protected $blazz = [];

    function produit(){
        return $this->belongsTo(produit::class,'id_produit','id');
    }
}
