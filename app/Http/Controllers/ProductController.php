<?php

namespace App\Http\Controllers;

use App\Services\Image\ImageService;
use App\Services\Product\ProductService;
use App\Services\Review\ReviewService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    protected $productService;
    protected $imageService;
    protected $reviewService;

    public function __construct(ProductService $productService, ImageService $imageService, ReviewService $reviewService)
    {
        $this->productService = $productService;
        $this->imageService = $imageService;
        $this->reviewService = $reviewService;
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

    public function getAllProductWithSaleOffGreaterThan()
    {
        $products = $this->productService->findAllBySaleOffGreaterThanZero();
        return response()->json($products['products'], $products['statusCode']);
    }

    public function getAllReviewByProduct($productId)
    {
        $reviews = $this->reviewService->getAllReviewByProduct($productId);
        return response()->json($reviews['reviews'], $reviews['statusCode']);
    }

    public function getAllProductByPriceCondition(Request $request)
    {
        $min = $request->min;
        $max = $request->max;
        $products = $this->productService->getAllProductByPriceCondition($min, $max);
        return response()->json($products['products'], $products['statusCode']);
    }

    public function getAllProductByName(Request $request)
    {
        $name = $request->name;
        $products = $this->productService->getAllProductByName($name);
        return response()->json($products['products'], $products['statusCode']);
    }
}
