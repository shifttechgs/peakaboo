<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function markRead(Request $request, string $id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        if ($request->wantsJson()) {
            return response()->json(['ok' => true]);
        }

        $url = $notification->data['url'] ?? route('admin.dashboard');
        return redirect($url);
    }

    public function markAllRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'All notifications marked as read.');
    }

    public function destroy(string $id)
    {
        auth()->user()->notifications()->findOrFail($id)->delete();
        return response()->json(['ok' => true]);
    }
}
