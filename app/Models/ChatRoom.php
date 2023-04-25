<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class ChatRoom extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'name',
        'last_message'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->chattable->name
        );
    }

    protected function lastMessage(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->messages()->orderBy('created_at', 'DESC')->first()
        );
    }

    public function chattable()
    {
        return $this->morphTo();
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
