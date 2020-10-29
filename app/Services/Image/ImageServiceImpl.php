<?php


namespace App\Services\Image;


use App\Repositories\Image\ImageRepository;

class ImageServiceImpl implements ImageService
{

    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function getAll()
    {
        return $this->imageRepository->getAllWithRelationship();
    }

    public function findById($id)
    {
        $image = $this->imageRepository->findByIdWithRelationship($id);
        $statusCode = 200;
        if (!$image) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'images' => $image
        ];
        return $data;
    }

    public function create($request)
    {
        $image = $this->imageRepository->create($request);

        $statusCode = 201;
        if (!$image)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'images' => $image
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldImage = $this->imageRepository->findById($id);
        if (!$oldImage) {
            $statusCode = 404;
            $newImage = null;
        } else {
            $newImage = $this->imageRepository->update($request, $oldImage);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'images' => $newImage
        ];
        return $data;
    }

    public function destroy($id)
    {
        $image = $this->imageRepository->findById($id);
        $statusCode = 200;
        if (!$image) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->imageRepository->destroy($image);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function findAllByProduct($productId)
    {
        $images = $this->imageRepository->findAllByProduct($productId);
        $statusCode = 200;
        if (!$images) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'images' => $images
        ];
        return $data;
    }
}
