<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $categoryService;
    protected $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index()
    {
        $category = $this->categoryService->getAll();
        return response()->json($category, 200);
    }

    public function show($id)
    {
        $category = $this->categoryService->findById($id);
        return response()->json($category['categories'], $category['statusCode']);
    }

    public function store(Request $request)
    {
        $dataCategory = $this->categoryService->create($request->all());

        return response()->json($dataCategory['categories'], $dataCategory['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataCategory = $this->categoryService->update($request->all(), $id);

        return response()->json($dataCategory['categories'], $dataCategory['statusCode']);
    }

    public function destroy($id)
    {
        $category = $this->categoryService->destroy($id);
        return response()->json($category['message'], $category['statusCode']);
    }

    public function findAllProductByCategory($id)
    {
        $products = $this->productService->findAllByCategory($id);
        return response()->json($products['products'], $products['statusCode']);
    }
}
