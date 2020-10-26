<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use App\Services\UserService;

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
}
