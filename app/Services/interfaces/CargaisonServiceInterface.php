<?php

namespace App\Services\interfaces;

use App\Models\Cargaison;

interface CargaisonServiceInterface
{
    public function create(array $data): Cargaison;
    public function getAll(array $filters = []): array;
    public function getDetails(int $id): ?Cargaison;
    public function updateStatus(int $id, string $status): bool;
    public function addProductToCargaison(int $cargaisonId, array $productData): bool;
    public function notifyRecipients(int $cargaisonId): void;
}
