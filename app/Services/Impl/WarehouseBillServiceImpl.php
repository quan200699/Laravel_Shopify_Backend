<?php


namespace App\Services\Impl;

use App\Repositories\WarehouseBillRepository;
use App\Services\WarehouseBillService;

class WarehouseBillServiceImpl implements WarehouseBillService
{
    protected $warehouseBillRepository;

    /**
     * CustomerServiceImpl constructor.
     * @param $warehouseRepository
     */
    public function __construct(WarehouseBillRepository $warehouseBillRepository)
    {
        $this->$warehouseBillRepository = $warehouseBillRepository;
    }


    public function getAll()
    {
        return $this->warehouseBillRepository->getAll();
    }

    public function findById($id)
    {
        $category = $this->warehouseBillRepository->findById($id);
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
        $category = $this->warehouseBillRepository->create($request);

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
        $oldCategory = $this->warehouseBillRepository->findById($id);
        if (!$oldCategory) {
            $statusCode = 404;
            $newCategory = null;
        } else {
            $newCategory = $this->warehouseBillRepository->update($request, $oldCategory);
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
        $category = $this->warehouseBillRepository->findById($id);
        $statusCode = 200;
        if (!$category) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->warehouseBillRepository->destroy($category);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
