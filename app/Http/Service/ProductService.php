<?php

namespace App\Service;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{
    public function showProducts(Request $request)
    {

        $name = $request->input('name');

        $query = Product::query();

        if ($name) {
            $query->searchByName($name);
        }
        $products = $query->orderBy('created_at', 'DESC')->paginate(10);

        return $products;
    }

    public function postProduct(Request $request)
    {
        $request->validate([
            'sort' => 'required|min:2|max:255|string',
            'brand' => 'required|min:2|max:255|string',
            'model' => 'required|min:2|max:255|string',
            'description' => 'required|max:1000',
            'urls' => 'required',
            'price' => 'required|integer',
        ]);

        $product = new Product();

        $product->sort = $request->sort;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->description = $request->description;
        $product->urls = $request->urls;
        $product->price = $request->price;

        $product->save();

        return $product;
    }

    public function showProduct(string $id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function editProduct(Request $request, string $id)
    {
        $request->validate([
            'sort' => 'required|min:2|max:255|string',
            'brand' => 'required|min:2|max:255|string',
            'model' => 'required|min:2|max:255|string',
            'description' => 'required|max:1000',
            'urls' => 'required',
            'price' => 'required|integer',
        ]);

        $product = Product::find($id);

        $product->sort = $request->sort;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->description = $request->description;
        $product->urls = $request->urls;
        $product->price = $request->price;

        $product->save();

        return $product;
    }

    public function deleteProduct(string $id)
    {
        Product::destroy($id);
    }
}
