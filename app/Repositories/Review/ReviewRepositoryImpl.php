<?php


namespace App\Repositories\Review;


use App\Repositories\Eloquent\EloquentRepository;
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
        $result = Review::with('user', 'product')->where('user_id', $userId)
            ->where('product_id', $productId)
            ->get();
        return $result;
    }

    public function getAllReviewByProduct($productId)
    {
        $result = Review::with('user', 'product')->where('product_id', $productId)->get();
        return $result;
    }

    public function getAllWithRelationship()
    {
        return Review::with('user', 'product')->get();
    }

    public function findByIdWithRelationship($id)
    {
        return Review::with('user', 'product')->where('id', $id);
    }
}
