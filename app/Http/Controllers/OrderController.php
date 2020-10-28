<?php

namespace App\Http\Controllers;

use App\Order;
use App\Services\OrderService;
use Carbon\Carbon;
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
        $order = $this->orderService->getAll();
        return response()->json($order, 200);
    }

    public function show($id)
    {
        $order = $this->orderService->findById($id);
        return response()->json($order['orders'], $order['statusCode']);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->status = $request->status;
        $order->user_id = $request->user_id;
        $order->create_date = Carbon::now();
        $dataOrder = $this->orderService->create($order);

        return response()->json($dataOrder['orders'], $dataOrder['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataOrder = $this->orderService->update($request->all(), $id);

        return response()->json($dataOrder['orders'], $dataOrder['statusCode']);
    }

    public function destroy($id)
    {
        $order = $this->orderService->destroy($id);
        return response()->json($order['message'], $order['statusCode']);
    }

    public function findAllByUserAndStatus($user_id, Request $request)
    {
        $status = $request->statuss;
        $orders = $this->orderService->findAllByUserAndStatus($user_id, $status);
        return response()->json($orders['orders'], $orders['statusCode']);
    }
}
