<?php

namespace App\Http\Controllers;

use App\Services\WarehouseService;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    //
    protected $warehouseService;

    /**
     * CustomerController constructor.
     * @param $warehouseService
     */
    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function index()
    {
        $warehouse = $this->warehouseService->getAll();
        return response()->json($warehouse, 200);
    }

    public function show($id)
    {
        $warehouse = $this->warehouseService->findById($id);
        return response()->json($warehouse['warehouses'], $warehouse['statusCode']);
    }

    public function store(Request $request)
    {
        $dataWarehouse = $this->warehouseService->create($request->all());

        return response()->json($dataWarehouse['warehouses'], $dataWarehouse['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataWarehouse = $this->warehouseService->update($request->all(), $id);

        return response()->json($dataWarehouse['warehouses'], $dataWarehouse['statusCode']);
    }

    public function destroy($id)
    {
        $warehouse = $this->warehouseService->destroy($id);
        return response()->json($warehouse['message'], $warehouse['statusCode']);
    }
}
