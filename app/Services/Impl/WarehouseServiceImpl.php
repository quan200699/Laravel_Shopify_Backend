<?php


namespace App\Services\Impl;

use App\Repositories\WarehouseRepository;
use App\Services\WarehouseService;

class WarehouseServiceImpl implements WarehouseService
{
    protected $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }


    public function getAll()
    {
        return $this->warehouseRepository->getAll();
    }

    public function findById($id)
    {
        $warehouse = $this->warehouseRepository->findById($id);
        $statusCode = 200;
        if (!$warehouse) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'warehouses' => $warehouse
        ];
        return $data;
    }

    public function create($request)
    {
        $warehouse = $this->warehouseRepository->create($request);
        $statusCode = 201;
        if (!$warehouse)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'warehouses' => $warehouse
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldWarehouse = $this->warehouseRepository->findById($id);
        if (!$oldWarehouse) {
            $statusCode = 404;
            $newWarehouse = null;
        } else {
            $newWarehouse = $this->warehouseRepository->update($request, $oldWarehouse);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'warehouses' => $newWarehouse
        ];
        return $data;
    }

    public function destroy($id)
    {
        $warehouse = $this->warehouseRepository->findById($id);
        $statusCode = 200;
        if (!$warehouse) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->warehouseRepository->destroy($warehouse);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
