<?php


namespace App\Services\ShoppingCart;


use App\Repositories\ShoppingCart\ShoppingCartRepository;

class ShoppingCartServiceImpl implements ShoppingCartService
{

    protected $shoppingCartRepository;

    public function __construct(ShoppingCartRepository $shoppingCartRepository)
    {
        $this->shoppingCartRepository = $shoppingCartRepository;
    }

    public function getAll()
    {
        return $this->shoppingCartRepository->getAll();
    }

    public function findById($id)
    {
        $shoppingCart = $this->shoppingCartRepository->findById($id);
        $statusCode = 200;
        if (!$shoppingCart) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'shoppingCart' => $shoppingCart
        ];
        return $data;
    }

    public function create($request)
    {
        $shoppingCart = $this->shoppingCartRepository->create($request);

        $statusCode = 201;
        if (!$shoppingCart)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'shoppingCart' => $shoppingCart
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldShoppingCart = $this->shoppingCartRepository->findById($id);
        if (!$oldShoppingCart) {
            $statusCode = 404;
            $newShoppingCart = null;
        } else {
            $newShoppingCart = $this->shoppingCartRepository->update($request, $oldShoppingCart);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'shoppingCart' => $newShoppingCart
        ];
        return $data;
    }

    public function destroy($id)
    {
        $shoppingCart = $this->shoppingCartRepository->findById($id);
        $statusCode = 200;
        if (!$shoppingCart) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->shoppingCartRepository->destroy($shoppingCart);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function findByUser($userId)
    {
        $shoppingCart = $this->shoppingCartRepository->findByUser($userId);
        $statusCode = 200;
        if (!$shoppingCart) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'shoppingCart' => $shoppingCart
        ];
        return $data;
    }
}
