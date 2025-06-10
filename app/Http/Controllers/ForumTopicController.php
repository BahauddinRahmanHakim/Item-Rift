<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumTopic;

class ForumTopicController extends Controller
{
    public function index()
    {
        return response()->json(ForumTopic::with('user')->orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string',
        ]);

        $user = auth()->user() ?? \App\Models\User::first(); // For demo, fallback to first user

        $topic = ForumTopic::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'user_id' => $user->id,
        ]);

        return response()->json(['success' => true, 'topic' => $topic->load('user')]);
    }
}
