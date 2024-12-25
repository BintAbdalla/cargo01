<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargaison extends Model
{
    protected $fillable = [
        'libelle', 'type', 'choice', 'productweight', 'productnumber', 
        'hideweight', 'hideproduct', 'status', 'etat_globale', 
        'date_depart', 'date_arrivee'
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
