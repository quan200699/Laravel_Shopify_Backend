<?php


namespace App\Services\Impl;

use App\Repositories\WarehouseBillRepository;
use App\Services\WarehouseBillService;

class WarehouseBillServiceImpl implements WarehouseBillService
{
    protected $warehouseBillRepository;

    public function __construct(WarehouseBillRepository $warehouseBillRepository)
    {
        $this->warehouseBillRepository = $warehouseBillRepository;
    }


    public function getAll()
    {
        return $this->warehouseBillRepository->getAll();
    }

    public function findById($id)
    {
        $warehouseBills = $this->warehouseBillRepository->findById($id);
        $statusCode = 200;
        if (!$warehouseBills) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'warehouseBills' => $warehouseBills
        ];
        return $data;
    }

    public function create($request)
    {
        $warehouseBills = $this->warehouseBillRepository->create($request);

        $statusCode = 201;
        if (!$warehouseBills)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'warehouseBills' => $warehouseBills
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldWarehouseBill = $this->warehouseBillRepository->findById($id);
        if (!$oldWarehouseBill) {
            $statusCode = 404;
            $newWarehouseBill = null;
        } else {
            $newWarehouseBill = $this->warehouseBillRepository->update($request, $oldWarehouseBill);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'warehouseBills' => $newWarehouseBill
        ];
        return $data;
    }

    public function destroy($id)
    {
        $warehouseBill = $this->warehouseBillRepository->findById($id);
        $statusCode = 200;
        if (!$warehouseBill) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->warehouseBillRepository->destroy($warehouseBill);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
