<?php


namespace App\Repositories\Impl;

use App\Category;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\CategoryRepository;

class CategoryRepositoryImpl extends EloquentRepository implements CategoryRepository
{

    public function getModel()
    {
        $model = Category::class;
        return $model;
    }
}
