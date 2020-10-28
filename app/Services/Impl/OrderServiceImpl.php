<?php


namespace App\Services\Impl;


use App\Repositories\OrderRepository;
use App\Services\OrderService;

class OrderServiceImpl implements OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
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
            'orders' => $order
        ];
        return $data;
    }

    public function create($request)
    {
        $order = $request->save();

        $statusCode = 201;
        if (!$order)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'orders' => $request
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldOrder = $this->orderRepository->findById($id);
        if (!$oldOrder) {
            $statusCode = 404;
            $newOrder = null;
        } else {
            $newOrder = $this->orderRepository->update($request, $oldOrder);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'orders' => $newOrder
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

    public function findAllByUserAndStatus($user_id, $status)
    {
        $orders = $this->orderRepository->findAllByUserAndStatus($user_id, $status);
        $statusCode = 200;
        if (!$orders) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'orders' => $orders
        ];
        return $data;
    }
}
