<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FoodRole extends Model
{
    use HasFactory;
    protected $table = "food_role";
    public $timestamps = false;
    protected $fillable = [
        'diet_id',
        'food_id'
    ];

    public function diets(): BelongsToMany
    {
        return $this->belongsToMany(Diet::class, 'food_role', 'diet_id', 'food_id');
    }
    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class, 'food_role', 'diet_id', 'food_id');
    }
}
