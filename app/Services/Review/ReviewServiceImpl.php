<?php


namespace App\Services\Review;


use App\Repositories\Review\ReviewRepository;

class ReviewServiceImpl implements ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function getAll()
    {
        return $this->reviewRepository->getAllWithRelationship();
    }

    public function findById($id)
    {
        $review = $this->reviewRepository->findByIdWithRelationship($id);
        $statusCode = 200;
        if (!$review) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'reviews' => $review
        ];
        return $data;
    }

    public function create($request)
    {
        $review = $request->save();
        $statusCode = 201;
        if (!$review)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'reviews' => $review
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldReview = $this->reviewRepository->findById($id);
        if (!$oldReview) {
            $statusCode = 404;
            $newReview = null;
        } else {
            $newReview = $this->reviewRepository->update($request, $oldReview);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'reviews' => $newReview
        ];
        return $data;
    }

    public function destroy($id)
    {
        $review = $this->reviewRepository->findById($id);
        $statusCode = 200;
        if (!$review) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->reviewRepository->destroy($review);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function findByUserAndProduct($userId, $productId)
    {
        $review = $this->reviewRepository->findByUserAndProduct($userId, $productId);
        $statusCode = 200;
        if (!$review) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'reviews' => $review
        ];
        return $data;
    }

    public function getAllReviewByProduct($productId)
    {
        $review = $this->reviewRepository->getAllReviewByProduct($productId);
        $statusCode = 200;
        if (!$review) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'reviews' => $review
        ];
        return $data;
    }
}
