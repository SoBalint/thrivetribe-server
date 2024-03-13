<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Diet extends Model
{
    use HasFactory;
    protected $table = "Diet";
    public $timestamps = false;
    protected $fillable = [
        'Name',
        'Description'
    ];

    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class, "food_role");
    }
}
