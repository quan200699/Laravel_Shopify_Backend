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
}
