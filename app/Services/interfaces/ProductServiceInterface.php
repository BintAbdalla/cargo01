<?php


namespace App\Services\interfaces;

use App\Models\Produit;

interface ProductServiceInterface
{
    public function create(array $data): Produit;
    public function getAllByCargaison(int $cargaisonId): array;
    public function delete(int $id): bool;
}
