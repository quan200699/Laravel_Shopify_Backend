<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    protected $imageService;


    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $image = $this->imageService->getAll();
        return response()->json($image, 200);
    }

    public function show($id)
    {
        $image = $this->imageService->findById($id);
        return response()->json($image['images'], $image['statusCode']);
    }

    public function store(Request $request)
    {
        $dataImage = $this->imageService->create($request->all());

        return response()->json($dataImage['images'], $dataImage['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataImage = $this->imageService->update($request->all(), $id);

        return response()->json($dataImage['images'], $dataImage['statusCode']);
    }

    public function destroy($id)
    {
        $image = $this->imageService->destroy($id);
        return response()->json($image['message'], $image['statusCode']);
    }
}
