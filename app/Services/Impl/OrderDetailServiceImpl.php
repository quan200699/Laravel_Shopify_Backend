<?php


namespace App\Services\Impl;

use App\Repositories\OrderDetailRepository;
use App\Services\OrderDetailService;

class OrderDetailServiceImpl implements OrderDetailService
{
    protected $orderDetailRepository;

    /**
     * CustomerServiceImpl constructor.
     * @param $categoryRepository
     */
    public function __construct(OrderDetailRepository $orderDetailRepository)
    {
        $this->orderDetailRepository = $orderDetailRepository;
    }


    public function getAll()
    {
        return $this->orderDetailRepository->getAll();
    }

    public function findById($id)
    {
        $orderDetail = $this->orderDetailRepository->findById($id);
        $statusCode = 200;
        if (!$orderDetail) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'categories' => $orderDetail
        ];
        return $data;
    }

    public function create($request)
    {
        $orderDetail = $this->orderDetailRepository->create($request);

        $statusCode = 201;
        if (!$orderDetail)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'categories' => $orderDetail
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldOrderDetail = $this->orderDetailRepository->findById($id);
        if (!$oldOrderDetail) {
            $statusCode = 404;
            $newCategory = null;
        } else {
            $newCategory = $this->orderDetailRepository->update($request, $oldOrderDetail);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'categories' => $newCategory
        ];
        return $data;
    }

    public function destroy($id)
    {
        $orderDetail = $this->orderDetailRepository->findById($id);
        $statusCode = 200;
        if (!$orderDetail) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->orderDetailRepository->destroy($orderDetail);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
