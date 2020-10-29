<?php

namespace App\Http\Controllers;

use App\Services\CustomerInfo\CustomerInfoService;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    protected $customerInfoService;

    public function __construct(CustomerInfoService $customerInfoService)
    {
        $this->customerInfoService = $customerInfoService;
    }
    public function index()
    {
        $customerInfo = $this->customerInfoService->getAll();
        return response()->json($customerInfo, 200);
    }

    public function show($id)
    {
        $customerInfo = $this->customerInfoService->findById($id);
        return response()->json($customerInfo['customerInfos'], $customerInfo['statusCode']);
    }

    public function store(Request $request)
    {
        $dataCustomerInfo = $this->customerInfoService->create($request->all());

        return response()->json($dataCustomerInfo['customerInfos'], $dataCustomerInfo['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataCustomerInfo = $this->customerInfoService->update($request->all(), $id);

        return response()->json($dataCustomerInfo['customerInfos'], $dataCustomerInfo['statusCode']);
    }

    public function destroy($id)
    {
        $customerInfos = $this->customerInfoService->destroy($id);
        return response()->json($customerInfos['message'], $customerInfos['statusCode']);
    }
}
