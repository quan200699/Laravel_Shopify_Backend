<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $categoryService;

    /**
     * CustomerController constructor.
     * @param $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
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
}
