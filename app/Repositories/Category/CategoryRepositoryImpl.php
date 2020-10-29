<?php


namespace App\Repositories\Category;

use App\Category;
use App\Repositories\Eloquent\EloquentRepository;

class CategoryRepositoryImpl extends EloquentRepository implements CategoryRepository
{

    public function getModel()
    {
        $model = Category::class;
        return $model;
    }
}
