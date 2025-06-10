<?php
// filepath: routes/api.php
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ForumTopicController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/items', [ItemController::class, 'index']); // All items
Route::get('/user/listings', function(Request $request) {
    $userId = $request->query('id');
    $user = \App\Models\User::find($userId);
    if (!$user) return response()->json([]);
    return $user->items()->latest()->get();
});
Route::get('/user/purchases', function(Request $request) {
    $userId = $request->query('id');
    $user = \App\Models\User::find($userId);
    if (!$user) return response()->json([]);
    return $user->purchases()->with('item')->latest('created_at')->get()->map->item;
});
Route::get('/user/saved', function(Request $request) {
    $userId = $request->query('id');
    $user = \App\Models\User::find($userId);
    if (!$user) return response()->json([]);
    return $user->savedItems()->latest()->get();
});
Route::post('/items', [ItemController::class, 'store']); // NOT /api/items
Route::get('/items/featured', [ItemController::class, 'featured']);
Route::post('/items/{item}/buy', [ItemController::class, 'buy']); // Buy an item
Route::post('/items/{item}/save', [ItemController::class, 'save']);
Route::post('/items/{item}/unsave', [ItemController::class, 'unsave']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/user', [AuthController::class, 'me']);

Route::get('/forum/topics', [ForumTopicController::class, 'index']);
Route::post('/forum/topics', [ForumTopicController::class, 'store']);

Route::get('/users/search', [MessageController::class, 'searchUsers']);
Route::post('/messages/send', [MessageController::class, 'send']);
Route::get('/messages/conversation/{userId}', [MessageController::class, 'conversation']);
Route::get('/users/conversations', [MessageController::class, 'conversations']);

Route::post('/user/update-username', function (Request $request) {
    $userId = $request->input('id');
    $user = \App\Models\User::find($userId);
    if (!$user) return response()->json(['error' => 'User not found'], 404);
    $request->validate(['username' => 'required|unique:users,username,' . $user->id]);
    $user->username = $request->username;
    $user->save();
    return response()->json(['success' => true]);
});