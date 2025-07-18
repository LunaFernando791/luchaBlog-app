<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'slug',
        'author',
        'is_published',
        'published_at',
        'featured_image',
        'excerpt',
        'user_id',
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
