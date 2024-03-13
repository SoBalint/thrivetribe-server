<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;
    protected $table = "Map";
    public $timestamps = false;
    protected $fillable = [
        'Address',
        'GymName',
        'OpenHour',
        'CordinationId'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, "CordinationId", "id");
    }
}
