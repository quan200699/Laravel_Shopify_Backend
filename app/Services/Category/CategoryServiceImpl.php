<?php


namespace App\Services\Category;


use App\Repositories\Category\CategoryRepository;

class CategoryServiceImpl implements CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function findById($id)
    {
        $category = $this->categoryRepository->findById($id);
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
        $category = $this->categoryRepository->create($request);

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
        $oldCategory = $this->categoryRepository->findById($id);
        if (!$oldCategory) {
            $statusCode = 404;
            $newCategory = null;
        } else {
            $newCategory = $this->categoryRepository->update($request, $oldCategory);
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
        $category = $this->categoryRepository->findById($id);
        $statusCode = 200;
        if (!$category) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->categoryRepository->destroy($category);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
