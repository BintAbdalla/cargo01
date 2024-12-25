<?php

namespace App\Repositories\Eloquent;

use App\Models\Cargaison;
use App\Repositories\Interfaces\CargaisonRepositoryInterface;

class CargaisonRepository implements CargaisonRepositoryInterface
{
    public function create(array $data)
    {
        return Cargaison::create($data);
    }

    public function getAll()
    {
        return Cargaison::all();
    }

    public function findById($id)
    {
        return Cargaison::with('produits')->findOrFail($id);
    }

    public function filterByType($type)
    {
        return Cargaison::where('type', $type)->get();
    }

    public function filterByCountry($departure, $arrival)
    {
        return Cargaison::where('departure', $departure)
                        ->where('arrival', $arrival)
                        ->get();
    }

    public function addProductToCargaison($cargaisonId, array $productData)
    {
        $cargaison = $this->findById($cargaisonId);

        if ($cargaison->status === 'fermé' && $cargaison->productnumber >= $cargaison->hideproduct) {
            throw new \Exception("Cargaison fermée et pleine !");
        }

        return $cargaison->produits()->create($productData);
    }
}
