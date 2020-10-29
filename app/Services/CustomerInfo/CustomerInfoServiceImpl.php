<?php


namespace App\Services\CustomerInfo;


use App\Repositories\CustomerInfo\CustomerInfoRepository;

class CustomerInfoServiceImpl implements CustomerInfoService
{
    protected $customerInfoRepository;

    public function __construct(CustomerInfoRepository $customerInfoRepository)
    {
        $this->customerInfoRepository = $customerInfoRepository;
    }

    public function getAll()
    {
        return $this->customerInfoRepository->getAllWithRelationship();
    }

    public function findById($id)
    {
        $customerInfo = $this->customerInfoRepository->findByIdWithRelationship($id);
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
        $oldCustomerInfo = $this->customerInfoRepository->findById($id);
        if (!$oldCustomerInfo) {
            $statusCode = 404;
            $newCustomerInfo = null;
        } else {
            $newCustomerInfo = $this->customerInfoRepository->update($request, $oldCustomerInfo);
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
