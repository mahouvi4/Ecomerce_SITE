<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class commande extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $hinx = 'commandes';
    protected $hanx = [];

    public function list_commande(){
        return $this->hasMany(list_commande::class,'id_commande','id');
    }
}
