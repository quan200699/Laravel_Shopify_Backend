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

    public function getAllWithRelationship()
    {
        // TODO: Implement getAllWithRelationship() method.
    }

    public function findByIdWithRelationship($id)
    {
        // TODO: Implement findByIdWithRelationship() method.
    }
}
