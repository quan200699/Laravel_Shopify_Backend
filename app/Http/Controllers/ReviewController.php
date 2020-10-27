<?php

namespace App\Http\Controllers;

use App\Review;
use App\Services\ReviewService;
use Carbon\Carbon;
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
        $review = new Review();
        $review->comment=$request->comment;
        $review->evaluate=$request->evaluate;
        $review->product_id=$request->product_id;
        $review->create_date = Carbon::now();
        $dataReview = $this->reviewService->create($review);

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
