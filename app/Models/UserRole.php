<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserRole extends Model
{
    use HasFactory;

    protected $table = "UserRole";
    public $timestamps = false;
    protected $fillable = [
        'userId',
        'roleId'
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Users::class, 'UserRole', 'userId', 'roleId');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'UserRole', 'userId', 'roleId');
    }
}
