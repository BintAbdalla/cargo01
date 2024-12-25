<?php

namespace App\Services;

use App\Models\Cargaison;
use App\Models\Produit;
use App\Services\interfaces\CargaisonServiceInterface;
use Illuminate\Support\Facades\Mail;


class CargaisonService implements CargaisonServiceInterface
{
    public function create(array $data): Cargaison
    {
        return Cargaison::create($data);
    }

    public function getAll(array $filters = []): array
    {
        $query = Cargaison::query();

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (isset($filters['pays_depart'])) {
            $query->where('pays_depart', $filters['pays_depart']);
        }

        if (isset($filters['pays_arrivee'])) {
            $query->where('pays_arrivee', $filters['pays_arrivee']);
        }

        return $query->get()->toArray();
    }

    public function getDetails(int $id): ?Cargaison
    {
        return Cargaison::with('produits')->find($id);
    }

    public function updateStatus(int $id, string $status): bool
    {
        $cargaison = Cargaison::find($id);
        if (!$cargaison) {
            return false;
        }
        $cargaison->status = $status;
        return $cargaison->save();
    }

    public function addProductToCargaison(int $cargaisonId, array $productData): bool
    {
        $cargaison = Cargaison::find($cargaisonId);

        if (!$cargaison || $cargaison->status === 'fermé') {
            return false;
        }

        Produit::create(array_merge($productData, ['cargaison_id' => $cargaisonId]));

        return true;
    }

    public function notifyRecipients(int $cargaisonId): void
    {
        $cargaison = Cargaison::with('produits')->find($cargaisonId);

        if ($cargaison && $cargaison->etat_globale === 'arriver') {
            foreach ($cargaison->produits as $produit) {
                // Mail::to($produit->email)->send(new \App\Mail\ProductArrived($produit));
            }
        } elseif ($cargaison && $cargaison->etat_globale === 'perdu') {
            foreach ($cargaison->produits as $produit) {
                // Mail::to($produit->email)->send(new \App\Mail\ProductLost($produit));
            }
        }
    }
}
