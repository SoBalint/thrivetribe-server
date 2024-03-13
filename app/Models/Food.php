<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends Model
{
    use HasFactory;
    protected $table = "Food";
    public $timestamps = false;
    protected $fillable = [
        'Name'
    ];

    public function diets(): BelongsToMany
    {
        return $this->belongsToMany(Diet::class, "food_role");
    }
}
