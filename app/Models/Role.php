<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    protected $table = "Role";
    public $timestamps = false;
    protected $fillable = [
        'Name'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Users::class, "UserRole" , "userId","roleId");
        //return $this->belongsToMany(Users::class, "UserRole");
    }
}
