<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ProductService;

class ProductsController extends Controller
{

    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $products = $this->productService->showProducts($request);
        return $products;
    }

    public function store(Request $request)
    {
        $product = $this->productService->postProduct($request);
        return $product;
    }

    public function update(Request $request, string $id)
    {
        $product = $this->productService->editProduct($request, $id);
        return $product;
    }

    public function destroy(string $id)
    {
        $product = $this->productService->deleteProduct($id);
        return $product;
    }
}
