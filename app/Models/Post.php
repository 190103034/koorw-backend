<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hash_id',
        'parent_id',
        'user_id',
        'category_id',
        'visibility_id',
        'body'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that serialization should come with.
     *
     * @var array<int, string>
     */
    protected $with = [
        'user:id,block_id,picture,name,username'
    ];

    /**
     * The attributes that should be appended for serialization.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'like_count',
        'comment_count'
    ];

    protected function likeCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->likes()->count() ?? null
        );
    }

    protected function commentCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->childPosts()->count() ?? null
        );
    }


    // Get user that belong to the post 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Get child posts that belong to the post 
    public function childPosts()
    {
        return $this->hasMany(Post::class, 'parent_id');
    }

    // Get likes that belong to the user 
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
