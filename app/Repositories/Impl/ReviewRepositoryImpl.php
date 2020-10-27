<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\ReviewRepository;
use App\Review;

class ReviewRepositoryImpl extends EloquentRepository implements ReviewRepository
{

    public function getModel()
    {
        $model = Review::class;
        return $model;
    }

    public function findByUserAndProduct($userId, $productId)
    {
        $result = $this->model->where('user_id', $userId)
            ->where('product_id', $productId)
            ->get();
        return $result;
    }

    public function getAllReviewByProduct($productId)
    {
        $result = $this->model->where('product_id', $productId)->get();
        return $result;
    }
}
