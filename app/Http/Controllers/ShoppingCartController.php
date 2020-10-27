<?php

namespace App\Http\Controllers;

use App\Services\ShoppingCartService;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    //

    protected $shoppingCartService;

    public function __construct(ShoppingCartService $shoppingCartService)
    {
        $this->shoppingCartService = $shoppingCartService;
    }

    public function index()
    {
        $shoppingCart = $this->shoppingCartService->getAll();
        return response()->json($shoppingCart, 200);
    }

    public function show($id)
    {
        $shoppingCart = $this->shoppingCartService->findById($id);
        return response()->json($shoppingCart['shoppingCart'], $shoppingCart['statusCode']);
    }

    public function store(Request $request)
    {
        $dataShoppingCart = $this->shoppingCartService->create($request->all());

        return response()->json($dataShoppingCart['shoppingCart'], $dataShoppingCart['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataShoppingCart = $this->shoppingCartService->update($request->all(), $id);

        return response()->json($dataShoppingCart['shoppingCart'], $dataShoppingCart['statusCode']);
    }

    public function destroy($id)
    {
        $shoppingCart = $this->shoppingCartService->destroy($id);
        return response()->json($shoppingCart['message'], $shoppingCart['statusCode']);
    }

    public function findShoppingCartByUser($userId)
    {
        $shoppingCart = $this->shoppingCartService->findByUser($userId);
        return response()->json($shoppingCart['shoppingCart'], $shoppingCart['statusCode']);
    }
}
