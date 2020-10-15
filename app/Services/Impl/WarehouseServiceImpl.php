<?php


namespace App\Services\Impl;

use App\Repositories\WarehouseRepository;
use App\Services\WarehouseService;

class WarehouseServiceImpl implements WarehouseService
{
    protected $warehouseRepository;

    /**
     * CustomerServiceImpl constructor.
     * @param $warehouseRepository
     */
    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->$warehouseRepository = $warehouseRepository;
    }


    public function getAll()
    {
        return $this->warehouseRepository->getAll();
    }

    public function findById($id)
    {
        $category = $this->warehouseRepository->findById($id);
        $statusCode = 200;
        if (!$category) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'categories' => $category
        ];
        return $data;
    }

    public function create($request)
    {
        $category = $this->warehouseRepository->create($request);

        $statusCode = 201;
        if (!$category)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'categories' => $category
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldCategory = $this->warehouseRepository->findById($id);
        if (!$oldCategory) {
            $statusCode = 404;
            $newCategory = null;
        } else {
            $newCategory = $this->warehouseRepository->update($request, $oldCategory);
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
        $category = $this->warehouseRepository->findById($id);
        $statusCode = 200;
        if (!$category) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->warehouseRepository->destroy($category);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
