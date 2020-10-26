<?php


namespace App\Services\Impl;


use App\Repositories\NotificationRepository;
use App\Services\NotificationService;

class NotificationServiceImpl implements NotificationService
{

    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function getAll()
    {
        return $this->notificationRepository->getAll();
    }

    public function findById($id)
    {
        $notifications = $this->notificationRepository->findById($id);
        $statusCode = 200;
        if (!$notifications) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'notifications' => $notifications
        ];
        return $data;
    }

    public function create($request)
    {

        $notifications = $request->save();

        $statusCode = 201;
        if (!$notifications)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'notifications' => $request
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldNotification = $this->notificationRepository->findById($id);
        if (!$oldNotification) {
            $statusCode = 404;
            $newNotification = null;
        } else {
            $newNotification = $this->notificationRepository->update($request, $oldNotification);
            $statusCode = 200;
        }
        $data = [
            'statusCode' => $statusCode,
            'notifications' => $newNotification
        ];
        return $data;
    }

    public function destroy($id)
    {
        $notifications = $this->notificationRepository->findById($id);
        $statusCode = 200;
        if (!$notifications) {
            $statusCode = 404;
            $message = "NOT FOUND";
        } else {
            $this->notificationRepository->destroy($notifications);
            $message = "DELETE SUCCESS";
        }
        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function findAllByStatusIsFalseAndUser($user_id)
    {
        $notifications = $this->notificationRepository->findAllByStatusIsFalseAndUser($user_id);
        $statusCode = 200;
        if (!$notifications) {
            $statusCode = 404;
        }
        $data = [
            'statusCode' => $statusCode,
            'notifications' => $notifications
        ];
        return $data;
    }
}
