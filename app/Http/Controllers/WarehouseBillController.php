<?php

namespace App\Http\Controllers;

use App\Services\WarehouseBillService;
use Illuminate\Http\Request;

class WarehouseBillController extends Controller
{
    //
    protected $warehouseBillService;

    /**
     * CustomerController constructor.
     * @param $warehouseBillService
     */
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
        return response()->json($warehouseBill['warehouses'], $warehouseBill['statusCode']);
    }

    public function store(Request $request)
    {
        $dataWarehouseBill = $this->warehouseBillService->create($request->all());

        return response()->json($dataWarehouseBill['warehouses'], $dataWarehouseBill['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataWarehouseBill = $this->warehouseBillService->update($request->all(), $id);

        return response()->json($dataWarehouseBill['warehouses'], $dataWarehouseBill['statusCode']);
    }

    public function destroy($id)
    {
        $warehouseBill = $this->warehouseBillService->destroy($id);
        return response()->json($warehouseBill['message'], $warehouseBill['statusCode']);
    }
}
