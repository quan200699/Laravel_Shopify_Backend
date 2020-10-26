<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $items = $this->itemService->getAll();
        return response()->json($items, 200);
    }

    public function show($id)
    {
        $items = $this->itemService->findById($id);
        return response()->json($items['items'], $items['statusCode']);
    }

    public function store(Request $request)
    {
        $dataItem = $this->itemService->create($request->all());

        return response()->json($dataItem['items'], $dataItem['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataItem = $this->itemService->update($request->all(), $id);

        return response()->json($dataItem['items'], $dataItem['statusCode']);
    }

    public function destroy($id)
    {
        $items = $this->itemService->destroy($id);
        return response()->json($items['message'], $items['statusCode']);
    }
}
