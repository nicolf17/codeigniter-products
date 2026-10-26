<?php

namespace App\Controllers;

use App\Services\ProductService;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductsController extends BaseController
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        $data = $this->productService->paginate();

        return view('products/index', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $data = $this->request->getPost(['name', 'description', 'price', 'stock']);

        if (! $this->productService->create($data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->productService->errors());
        }

        return redirect()->to('/products')
            ->with('success', 'Product created successfully.');
    }

    public function edit(int $id)
    {
        $product = $this->findOrFail($id);

        return view('products/edit', ['product' => $product]);
    }

    public function update(int $id)
    {
        $this->findOrFail($id);

        $data = $this->request->getPost(['name', 'description', 'price', 'stock']);

        if (! $this->productService->update($id, $data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->productService->errors());
        }

        return redirect()->to('/products')
            ->with('success', 'Product updated successfully.');
    }

    public function delete(int $id)
    {
        $this->findOrFail($id);
        $this->productService->delete($id);

        return redirect()->to('/products')
            ->with('success', 'Product deleted successfully.');
    }

    private function findOrFail(int $id): object
    {
        $product = $this->productService->find($id);

        if ($product === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $product;
    }
}