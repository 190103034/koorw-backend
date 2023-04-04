<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Street extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'name_ru',
        'name_kk',
        'name_en',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be appended for serialization.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'name'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->{'name_' . App::getLocale()} ?? $this->name_ru
        );
    }
}
