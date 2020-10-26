<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $notifications = $this->notificationService->getAll();
        return response()->json($notifications, 200);
    }

    public function show($id)
    {
        $notification = $this->notificationService->findById($id);
        return response()->json($notification['notifications'], $notification['statusCode']);
    }

    public function store(Request $request)
    {
        $dataNotification = $this->notificationService->create($request->all());

        return response()->json($dataNotification['notifications'], $dataNotification['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataNotification = $this->notificationService->update($request->all(), $id);

        return response()->json($dataNotification['notifications'], $dataNotification['statusCode']);
    }

    public function destroy($id)
    {
        $notifications = $this->notificationService->destroy($id);
        return response()->json($notifications['message'], $notifications['statusCode']);
    }
}
