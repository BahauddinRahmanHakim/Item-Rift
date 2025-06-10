<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    // Search users by username
    public function searchUsers(Request $request)
    {
        $q = $request->input('q');
        $users = User::where('username', 'like', "%$q%")->limit(10)->get(['id', 'username', 'name']);
        return response()->json($users);
    }

    // Send a message
    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string'
        ]);

        $sender = auth()->user() ?? User::first(); // fallback for demo

        $message = Message::create([
            'sender_id' => $sender->id,
            'receiver_id' => $request->receiver_id,
            'content' => $request->content
        ]);

        return response()->json(['success' => true, 'message' => $message]);
    }

    // Get conversation between two users
    public function conversation(Request $request, $userId)
    {
        $sender = auth()->user() ?? User::first(); // fallback for demo

        $messages = Message::where(function($q) use ($sender, $userId) {
            $q->where('sender_id', $sender->id)->where('receiver_id', $userId);
        })->orWhere(function($q) use ($sender, $userId) {
            $q->where('sender_id', $userId)->where('receiver_id', $sender->id);
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }

    // Get conversations for the authenticated user
    public function conversations()
    {
        $user = auth()->user() ?? \App\Models\User::first();
        $userIds = \App\Models\Message::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->get()
            ->flatMap(function($msg) use ($user) {
                return [$msg->sender_id, $msg->receiver_id];
            })
            ->unique()
            ->reject(fn($id) => $id == $user->id)
            ->values();

        $users = \App\Models\User::whereIn('id', $userIds)->get();
        foreach ($users as $u) {
            $lastMsg = \App\Models\Message::where(function($q) use ($user, $u) {
                $q->where('sender_id', $user->id)->where('receiver_id', $u->id);
            })->orWhere(function($q) use ($user, $u) {
                $q->where('sender_id', $u->id)->where('receiver_id', $user->id);
            })->orderBy('created_at', 'desc')->first();
            $u->last_message = $lastMsg ? $lastMsg->content : '';
            $u->image_url = $u->image_url ?? null; // or set default if you have one
        }
        return response()->json($users);
    }
}
