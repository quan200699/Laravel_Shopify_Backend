<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        $review = $this->reviewService->getAll();
        return response()->json($review, 200);
    }

    public function show($id)
    {
        $review = $this->reviewService->findById($id);
        return response()->json($review['reviews'], $review['statusCode']);
    }

    public function store(Request $request)
    {
        $dataReview = $this->reviewService->create($request->all());

        return response()->json($dataReview['reviews'], $dataReview['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataReview = $this->reviewService->update($request->all(), $id);

        return response()->json($dataReview['reviews'], $dataReview['statusCode']);
    }

    public function destroy($id)
    {
        $review = $this->reviewService->destroy($id);
        return response()->json($review['message'], $review['statusCode']);
    }
}
