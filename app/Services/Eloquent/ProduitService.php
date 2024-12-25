<?php

namespace App\Services;

use App\Models\Produit;
use App\Services\interfaces\ProductServiceInterface;

class ProduitService implements ProductServiceInterface
{
    public function create(array $data): Produit
    {
        return Produit::create($data);
    }

    public function getAllByCargaison(int $cargaisonId): array
    {
        return Produit::where('cargaison_id', $cargaisonId)->get()->toArray();
    }

    public function delete(int $id): bool
    {
        $produit = Produit::find($id);
        if (!$produit) {
            return false;
        }
        return $produit->delete();
    }
}
