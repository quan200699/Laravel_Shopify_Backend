<?php


namespace App\Services\WarehouseBillDetail;


use App\Repositories\WarehouseBillDetail\WarehouseBillDetailRepository;

class WarehouseBillDetailServiceImpl implements WarehouseBillDetailService
{
    protected $warehouseBillDetailRepository;

    public function __construct(WarehouseBillDetailRepository $warehouseBillDetailRepository)
    {
        $this->warehouseBillDetailRepository = $warehouseBillDetailRepository;
    }

    public function getAll()
    {
        return $this->warehouseBillDetailRepository->getAllWithRelationship();
    }

    public function findById($id)
    {
        $wareHouseBillDetail = $this->warehouseBillDetailRepository->findByIdWithRelationship($id);
        $statusCode = 200;
        if (!$wareHouseBillDetail) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'wareHouseBillDetails' => $wareHouseBillDetail
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
            'wareHouseBillDetails' => $wareHouseBillDetail
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldWareHouseBillDetail = $this->warehouseBillDetailRepository->findById($id);
        if (!$oldWareHouseBillDetail) {
            $statusCode = 404;
            $newWareHouseBillDetails = null;
        } else {
            $newWareHouseBillDetails = $this->warehouseBillDetailRepository->update($request, $oldWareHouseBillDetail);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'wareHouseBillDetails' => $newWareHouseBillDetails
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

    public function findAllByWarehouseBill($warehouseBillId)
    {
        $wareHouseBillDetail = $this->warehouseBillDetailRepository->findAllByWarehouseBill($warehouseBillId);
        $statusCode = 200;
        if (!$wareHouseBillDetail) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'wareHouseBillDetails' => $wareHouseBillDetail
        ];
        return $data;
    }

    public function sumAllProduct($productId)
    {
        $totalProduct = $this->warehouseBillDetailRepository->sumAllProduct($productId);
        $statusCode = 200;
        if (!$totalProduct) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'totalProduct' => $totalProduct
        ];
        return $data;
    }
}
