<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id', // ✅ add this so category is saved
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
