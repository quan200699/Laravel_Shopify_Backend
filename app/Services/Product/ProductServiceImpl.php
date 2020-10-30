<?php


namespace App\Services\Product;


use App\Repositories\Product\ProductRepository;

class ProductServiceImpl implements ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAllWithRelationship();
    }

    public function findById($id)
    {
        $product = $this->productRepository->findByIdWithRelationship($id);
        $statusCode = 200;
        if (!$product) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $product
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
            'products' => $product
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
            'products' => $newProduct
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

    public function findAllByCategory($categoryId)
    {
        $products = $this->productRepository->findAllByCategory($categoryId);
        $statusCode = 200;
        if (!$products) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $products
        ];
        return $data;
    }

    public function findAllBySaleOffGreaterThanZero()
    {
        $products = $this->productRepository->findAllBySaleOffGreaterThanZero();
        $statusCode = 200;
        if (!$products) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $products
        ];
        return $data;
    }

    public function getAllProductByPriceCondition($min, $max)
    {
        $products = $this->productRepository->getAllProductByPriceCondition($min, $max);
        $statusCode = 200;
        if (!$products) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $products
        ];
        return $data;
    }

    public function getAllProductByName($name)
    {
        $products = $this->productRepository->getAllProductByName($name);
        $statusCode = 200;
        if (!$products) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $products
        ];
        return $data;
    }

    public function getAllProductLatest()
    {
        $products = $this->productRepository->getAllProductLatest();
        $statusCode = 200;
        if (!$products) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'products' => $products
        ];
        return $data;
    }
}
