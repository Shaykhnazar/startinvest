<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAllAsRead(Request $request)
    {
        $user = $request->user();
        $user->unreadNotifications->markAsRead();

        return response()->json(['message' => 'Barcha bildirishnomalar o\'qilgan deb belgilandi.']);
    }

    /**
     * Mark a specific notification as read.
     *
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsRead(Request $request, $id)
    {
        // Find the notification for the authenticated user
        $notification = $request->user()->notifications()->findOrFail($id);

        // Mark it as read
        $notification->markAsRead();

        return response()->json(['message' => 'Bildirishnoma o‘qilgan deb belgilandi.']);
    }
}
