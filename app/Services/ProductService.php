<?php

namespace App\Services;

use App\Models\ProductModel;

class ProductService
{
    private ProductModel $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function paginate(int $perPage = 10): array
    {
        return [
            'products' => $this->productModel->orderBy('id', 'DESC')->paginate($perPage),
            'pager'    => $this->productModel->pager,
        ];
    }

    public function find(int $id): ?object
    {
        return $this->productModel->find($id);
    }

    public function create(array $data): bool
    {
        return (bool) $this->productModel->insert($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->productModel->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return (bool) $this->productModel->delete($id);
    }

    public function errors(): array
    {
        return $this->productModel->errors();
    }
}