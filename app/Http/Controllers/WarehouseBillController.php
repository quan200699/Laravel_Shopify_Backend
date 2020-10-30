<?php

namespace App\Http\Controllers;

use App\Services\WarehouseBill\WarehouseBillService;
use App\WarehouseBill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WarehouseBillController extends Controller
{
    //
    protected $warehouseBillService;

    public function __construct(WarehouseBillService $warehouseBillService)
    {
        $this->warehouseBillService = $warehouseBillService;
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

    public function sumTotalPriceHaveBought(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $totalMoney = $this->warehouseBillService->sumTotalPriceHaveBought($month, $year);
        return response()->json($totalMoney['totalMoney'], $totalMoney['statusCode']);
    }
}
