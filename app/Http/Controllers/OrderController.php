<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $order= $this->orderService->getAll();
        return response()->json($order, 200);
    }

    public function show($id)
    {
        $order = $this->orderService->findById($id);
        return response()->json($order['categories'], $order['statusCode']);
    }

    public function store(Request $request)
    {
        $dataOrder = $this->orderService->create($request->all());

        return response()->json($dataOrder['categories'], $dataOrder['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataOrder = $this->orderService->update($request->all(), $id);

        return response()->json($dataOrder['categories'], $dataOrder['statusCode']);
    }

    public function destroy($id)
    {
        $order = $this->orderService->destroy($id);
        return response()->json($order['message'], $order['statusCode']);
    }
}
