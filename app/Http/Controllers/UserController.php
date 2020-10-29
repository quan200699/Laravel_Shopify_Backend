<?php

namespace App\Http\Controllers;


use App\Services\Notification\NotificationService;
use App\Services\User\UserService;

class UserController extends Controller
{
    //
    protected $userService;
    protected $notificationService;

    public function __construct(UserService $userService, NotificationService $notificationService)
    {
        $this->userService = $userService;
        $this->notificationService = $notificationService;
    }

    public function getAllNotificationByUser($id)
    {
        $notifications = $this->notificationService->findAllByStatusIsFalseAndUser($id);
        return response()->json($notifications['notifications'], $notifications['statusCode']);
    }

    public function getAllNotificationByUserAndDateDesc($id)
    {
        $notifications = $this->notificationService->findAllByUserAndDateDesc($id);
        return response()->json($notifications['notifications'], $notifications['statusCode']);
    }
}
