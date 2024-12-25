<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'first_name', 'second_name', 'adress', 'email', 'phone_number', 
        'nameproduct', 'weight', 'producttype', 'typepro', 'sendname', 
        'recipientname', 'departure', 'arrival', 'cargaison_id'
    ];

    public function cargaison()
    {
        return $this->belongsTo(Cargaison::class);
    }
}
