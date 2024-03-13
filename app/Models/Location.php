<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = "Location";
    public $timestamps = false;
    protected $fillable = [
        'latitude',
        'longitude'
    ];

    public function maps()
    {
        return $this->hasMany(Map::class, "CordinationId", "id");
    }
}
