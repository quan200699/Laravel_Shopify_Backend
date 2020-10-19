<?php


namespace App\Services\Impl;


use App\Repositories\WarehouseBillDetailRepository;

class WarehouseBillDetailServiceImpl implements \App\Services\WarehouseBillDetailService
{
    protected $warehouseBillDetailRepository;

    public function __construct(WarehouseBillDetailRepository  $warehouseBillDetailRepository)
    {
        $this->warehouseBillDetailRepository = $warehouseBillDetailRepository;
    }

    public function getAll()
    {
        return $this->warehouseBillDetailRepository->getAll();
    }

    public function findById($id)
    {
        $wareHouseBillDetail = $this->warehouseBillDetailRepository->findById($id);
        $statusCode = 200;
        if (!$wareHouseBillDetail) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $wareHouseBillDetail
        ];
        return $data;
    }

    public function create($request)
    {
        $wareHouseBillDetail = $this->warehouseBillDetailRepository->create($request);

        $statusCode = 201;
        if (!$wareHouseBillDetail)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'products' => $product
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldWareHouseBillDetail = $this->warehouseBillDetailRepository->findById($id);
        if (!$oldWareHouseBillDetail) {
            $statusCode = 404;
            $newProduct = null;
        } else {
            $newProduct = $this->warehouseBillDetailRepository->update($request, $oldWareHouseBillDetail);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $newProduct
        ];
        return $data;
    }

    public function destroy($id)
    {
        $wareHouseBillDetail = $this->warehouseBillDetailRepository->findById($id);
        $statusCode = 200;
        if (!$wareHouseBillDetail) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->warehouseBillDetailRepository->destroy($wareHouseBillDetail);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
