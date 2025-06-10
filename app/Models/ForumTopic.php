<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model
{
    use HasFactory;

    // Tambahkan field yang boleh diisi massal di sini
    protected $fillable = [
        'title', // tambahkan ini
        'content',
        'category',
        'user_id'
        // tambahkan field lain yang memang boleh diisi massal, misal:
        // 'content', 'user_id', dst.
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
