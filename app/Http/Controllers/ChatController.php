<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function all(Request $request)
    {
        $user = $request->user();

        $friends = User::whereHas('sentMessages', function ($query) use ($user) {
            $query->where('receiver_id', $user->id);
        })->orWhereHas('receivedMessages', function ($query) use ($user) {
            $query->where('sender_id', $user->id);
        })->get();

        return Inertia::render('Chat/List', [
            'friends' => $friends,
            'currentUser' => $user,
        ]);
    }

    public function personal(Request $request, User $friend)
    {
        $user = $request->user();

        return Inertia::render('Chat/Private', [
            'friend' => $friend,
            'currentUser' => $user,
        ]);
    }

    public function messages(Request $request, User $friend)
    {
        $user = $request->user();

        return ChatMessage::query()
            ->where(function ($query) use ($user, $friend) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', $friend->id);
            })
            ->orWhere(function ($query) use ($user, $friend) {
                $query->where('sender_id', $friend->id)
                    ->where('receiver_id', $user->id);
            })
            ->with(['sender', 'receiver'])
            ->orderBy('id')
            ->get();
    }

    public function send(Request $request, User $friend)
    {
        $user = $request->user();

        $message = ChatMessage::create([
            'sender_id' => $user->id,
            'receiver_id' => $friend->id,
            'text' => $request->get('message')
        ]);

        broadcast(new MessageSent($message));

        return response()->json([
            'message' => $message
        ]);
    }
}
