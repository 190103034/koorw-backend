<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class House extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->houseName->name ?? $this->street->name . ', ' . $this->house_number
        );
    }

    public function houseName()
    {
        return $this->hasOne(HouseName::class);
    }

    public function street()
    {
        return $this->belongsTo(Street::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, HouseService::class);
    }
}
