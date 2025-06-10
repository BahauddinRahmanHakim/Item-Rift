<?php
// filepath: app/Http/Controllers/ItemController.php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('condition')) {
            $query->where('condition', $request->condition);
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->orderBy('created_at', 'desc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'condition' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageUrls = [];
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $path = $image->store('items', 'public');
                $imageUrls[] = '/storage/' . $path;
            }
        }

        $item = \App\Models\Item::create([
            'title' => $request->title,
            'price' => $request->price,
            'category' => $request->category,
            'condition' => $request->condition,
            'location' => $request->location,
            'description' => $request->description,
            'image_url' => $imageUrls[0] ?? null, // Save first image as main
            'user_id' => auth()->id() ?? 1 // Replace with real user auth
        ]);

        // Optionally save all images in a separate table if you want multiple images per item

        return response()->json(['success' => true, 'item' => $item]);
    }

    public function featured()
    {
        $items = \App\Models\Item::orderBy('created_at', 'desc')->take(4)->get();
        return response()->json($items);
    }

    public function buy(Request $request, $itemId)
    {
        $user = auth()->user() ?? \App\Models\User::first();
        $item = \App\Models\Item::findOrFail($itemId);

        // Simpan ke tabel purchases (buat migration jika belum ada)
        \App\Models\Purchase::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
        ]);

        return response()->json(['success' => true, 'message' => 'Purchase successful!']);
    }

    public function save($itemId)
    {
        $user = auth()->user() ?? \App\Models\User::first();
        $user->savedItems()->attach($itemId);
        return response()->json(['success' => true]);
    }

    public function unsave($itemId)
    {
        $user = auth()->user() ?? \App\Models\User::first();
        $user->savedItems()->detach($itemId);
        return response()->json(['success' => true]);
    }
}