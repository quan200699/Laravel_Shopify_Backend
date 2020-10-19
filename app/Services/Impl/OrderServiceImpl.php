<?php


namespace App\Services\Impl;


use App\Repositories\OrderRepository;

class OrderServiceImpl implements \App\Services\OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository  $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAll()
    {
        return $this->orderRepository->getAll();
    }

    public function findById($id)
    {
        $order = $this->orderRepository->findById($id);
        $statusCode = 200;
        if (!$order) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $order
        ];
        return $data;
    }

    public function create($request)
    {
        $order = $this->orderRepository->create($request);

        $statusCode = 201;
        if (!$order)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'products' => $order
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldOrder = $this->orderRepository->findById($id);
        if (!$oldOrder) {
            $statusCode = 404;
            $newProduct = null;
        } else {
            $newProduct = $this->orderRepository->update($request, $oldOrder);
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
        $order = $this->orderRepository->findById($id);
        $statusCode = 200;
        if (!$order) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->orderRepository->destroy($order);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
