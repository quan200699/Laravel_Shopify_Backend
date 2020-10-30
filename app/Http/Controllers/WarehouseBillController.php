<?php

namespace App\Http\Controllers;

use App\Services\WarehouseBill\WarehouseBillService;
use App\Services\WarehouseBillDetail\WarehouseBillDetailService;
use App\WarehouseBill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WarehouseBillController extends Controller
{
    //
    protected $warehouseBillService;
    protected $warehouseBillDetailService;

    public function __construct(WarehouseBillService $warehouseBillService, WarehouseBillDetailService $warehouseBillDetailService)
    {
        $this->warehouseBillService = $warehouseBillService;
        $this->warehouseBillDetailService = $warehouseBillDetailService;
    }

    public function index()
    {
        $warehouseBill = $this->warehouseBillService->getAll();
        return response()->json($warehouseBill, 200);
    }

    public function show($id)
    {
        $warehouseBill = $this->warehouseBillService->findById($id);
        return response()->json($warehouseBill['warehouseBills'], $warehouseBill['statusCode']);
    }

    public function store(Request $request)
    {
        $warehouseBill = new WarehouseBill();
        $warehouseBill->create_date = Carbon::now();
        $warehouseBill->warehouse_id = $request->warehouse_id;
        $dataWarehouseBill = $this->warehouseBillService->create($warehouseBill);

        return response()->json($dataWarehouseBill['warehouseBills'], $dataWarehouseBill['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataWarehouseBill = $this->warehouseBillService->update($request->all(), $id);

        return response()->json($dataWarehouseBill['warehouseBills'], $dataWarehouseBill['statusCode']);
    }

    public function destroy($id)
    {
        $warehouseBill = $this->warehouseBillService->destroy($id);
        return response()->json($warehouseBill['message'], $warehouseBill['statusCode']);
    }

    public function findAllByWarehouseBill($warehouseBillId)
    {
        $warehouseBillDetails = $this->warehouseBillDetailService->findAllByWarehouseBill($warehouseBillId);
        return response()->json($warehouseBillDetails['wareHouseBillDetails'], $warehouseBillDetails['statusCode']);
    }
}
