<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    protected $productService;
    protected $imageService;

    public function __construct(ProductService $productService, ImageService $imageService)
    {
        $this->productService = $productService;
        $this->imageService = $imageService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return response()->json($products, 200);
    }

    public function show($id)
    {
        $product = $this->productService->findById($id);
        return response()->json($product['products'], $product['statusCode']);
    }

    public function store(Request $request)
    {
        $dataProduct = $this->productService->create($request->all());

        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataProduct = $this->productService->update($request->all(), $id);

        return response()->json($dataProduct['products'], $dataProduct['statusCode']);
    }

    public function destroy($id)
    {
        $product = $this->productService->destroy($id);
        return response()->json($product['message'], $product['statusCode']);
    }

    public function getAllImage($id)
    {
        $images = $this->imageService->findAllByProduct($id);
        return response()->json($images['images'], $images['statusCode']);
    }
}
