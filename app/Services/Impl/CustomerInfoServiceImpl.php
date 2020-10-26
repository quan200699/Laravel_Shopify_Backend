<?php


namespace App\Services\Impl;


use App\Repositories\CustomerInfoRepository;
use App\Services\CustomerInfoService;

class CustomerInfoServiceImpl implements CustomerInfoService
{
    protected $customerInfoRepository;

    public function __construct(CustomerInfoRepository  $customerInfoRepository)
    {
        $this->customerInfoRepository = $customerInfoRepository;
    }

    public function getAll()
    {
        return $this->customerInfoRepository->getAll();
    }

    public function findById($id)
    {
        $customerInfo = $this->customerInfoRepository->findById($id);
        $statusCode = 200;
        if (!$customerInfo) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'customerInfos' => $customerInfo
        ];
        return $data;
    }

    public function create($request)
    {
        $customerInfo = $this->customerInfoRepository->create($request);

        $statusCode = 201;
        if (!$customerInfo)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'customerInfos' => $customerInfo
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldCustomerinfo = $this->customerInfoRepository->findById($id);
        if (!$oldCustomerinfo) {
            $statusCode = 404;
            $newCustomerInfo = null;
        } else {
            $newCustomerInfo = $this->customerInfoRepository->update($request, $oldCustomerinfo);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'customerInfos' => $newCustomerInfo
        ];
        return $data;
    }

    public function destroy($id)
    {
        $customerInfo = $this->customerInfoRepository->findById($id);
        $statusCode = 200;
        if (!$customerInfo) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->customerInfoRepository->destroy($customerInfo);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
