<?php

namespace App\Repositories\Interfaces;

interface CargaisonRepositoryInterface
{
    public function create(array $data);
    public function getAll();
    public function findById($id);
    public function filterByType($type);
    public function filterByCountry($departure, $arrival);
    public function addProductToCargaison($cargaisonId, array $productData);
}
