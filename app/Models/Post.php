<?php

namespace App\Models;

use App\Helper\Slug;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'image_path', 'user_id', 'category_id', 'approved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeApproved($query)
    {
        return $query->whereApproved(true)->latest();
    }

    public function getImagepathAttribute($img)
    {
        return asset('storage/images/' . $img);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Slug::uniqueSlug($value, 'posts');
    }

}
