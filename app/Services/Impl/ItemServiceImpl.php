<?php


namespace App\Services\Impl;


use App\Repositories\ItemRepository;
use App\Services\ItemService;

class ItemServiceImpl implements ItemService
{
    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }


    public function getAll()
    {
        return $this->itemRepository->getAll();
    }

    public function findById($id)
    {
        $items = $this->itemRepository->findById($id);
        $statusCode = 200;
        if (!$items) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'items' => $items
        ];
        return $data;
    }

    public function create($request)
    {
        $items = $this->itemRepository->create($request);

        $statusCode = 201;
        if (!$items)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'items' => $items
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldItem = $this->itemRepository->findById($id);
        if (!$oldItem) {
            $statusCode = 404;
            $newItem = null;
        } else {
            $newItem = $this->itemRepository->update($request, $oldItem);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'items' => $newItem
        ];
        return $data;
    }

    public function destroy($id)
    {
        $items = $this->itemRepository->findById($id);
        $statusCode = 200;
        if (!$items) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->itemRepository->destroy($items);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
