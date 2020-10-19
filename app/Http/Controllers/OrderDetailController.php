<?php

namespace App\Http\Controllers;

use App\Services\OrderDetailService;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    //
    protected $orderDetailService;

    public function __construct(OrderDetailService $orderDetailService )
    {
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $orderDetail = $this->orderDetailService->getAll();
        return response()->json($orderDetail, 200);
    }

    public function show($id)
    {
        $orderDetail = $this->orderDetailService->findById($id);
        return response()->json($orderDetail['categories'], $orderDetail['statusCode']);
    }

    public function store(Request $request)
    {
        $dataOrderDetail = $this->orderDetailService->create($request->all());

        return response()->json($dataOrderDetail['categories'], $dataOrderDetail['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataOrderDetail = $this->orderDetailService->update($request->all(), $id);

        return response()->json($dataOrderDetail['categories'], $dataOrderDetail['statusCode']);
    }

    public function destroy($id)
    {
        $orderDetail = $this->orderDetailService->destroy($id);
        return response()->json($orderDetail['message'], $orderDetail['statusCode']);
    }
}
