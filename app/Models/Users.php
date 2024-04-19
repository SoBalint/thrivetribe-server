<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Users extends Model
{
    use HasFactory;
    protected $table = "Users";
    public $timestamps = false;

    protected $fillable = [
        'UserName',
        'Password',
        'Email',
        'FirstName',
        'LastName',
        'Age',
        'Height',
        'Weight',
        'Phone',
        'CoachExperienceId',
        'LastLogin'
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, "FavouriteTrainingId", "id");
    }

    public function diet()
    {
        return $this->belongsTo(Diet::class, "FavouriteDietId", "id");
    }

    public function coachexperience()
    {
        return $this->belongsTo(CoachExperience::class, "CoachExperienceId", "id");
    }

    public function messages()
    {
        return $this->hasMany(Message::class, "UserId", "id");
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, "UserRole","userId","roleId");
    }
}
