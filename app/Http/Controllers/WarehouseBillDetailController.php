<?php

namespace App\Http\Controllers;

use App\Services\WarehouseBillDetailService;
use Illuminate\Http\Request;

class WarehouseBillDetailController extends Controller
{
    //
    protected $warehouseBillDetailService;

    public function __construct(WarehouseBillDetailService $warehouseBillDetailService)
    {
        $this->warehouseBillDetailService = $warehouseBillDetailService;
    }

    public function index()
    {
        $warehouseBillDetail = $this->warehouseBillDetailService->getAll();
        return response()->json($warehouseBillDetail, 200);
    }

    public function show($id)
    {
        $warehouseBillDetail = $this->warehouseBillDetailService->findById($id);
        return response()->json($warehouseBillDetail['reviews'], $warehouseBillDetail['statusCode']);
    }

    public function store(Request $request)
    {
        $dataWarehouseBillDetail = $this->warehouseBillDetailService->create($request->all());

        return response()->json($dataWarehouseBillDetail['reviews'], $dataWarehouseBillDetail['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataWarehouseBillDetail = $this->warehouseBillDetailService->update($request->all(), $id);

        return response()->json($dataWarehouseBillDetail['reviews'], $dataWarehouseBillDetail['statusCode']);
    }

    public function destroy($id)
    {
        $warehouseBillDetail = $this->warehouseBillDetailService->destroy($id);
        return response()->json($warehouseBillDetail['message'], $warehouseBillDetail['statusCode']);
    }
}
