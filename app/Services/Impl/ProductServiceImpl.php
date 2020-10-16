<?php


namespace App\Services\Impl;


use App\Repositories\ProductRepository;

class ProductServiceImpl implements \App\Services\ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository  $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function findById($id)
    {
        $product = $this->productRepository->findById($id);
        $statusCode = 200;
        if (!$product) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            '$products' => $product
        ];
        return $data;
    }

    public function create($request)
    {
        $product = $this->productRepository->create($request);

        $statusCode = 201;
        if (!$product)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            '$products' => $product
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldProduct = $this->productRepository->findById($id);
        if (!$oldProduct) {
            $statusCode = 404;
            $newProduct = null;
        } else {
            $newProduct = $this->productRepository->update($request, $oldProduct);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            '$products' => $newProduct
        ];
        return $data;
    }

    public function destroy($id)
    {
        $product = $this->productRepository->findById($id);
        $statusCode = 200;
        if (!$product) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->productRepository->destroy($product);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
