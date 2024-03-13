<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachExperience extends Model
{
    use HasFactory;
    protected $table = "CoachExperience";
    public $timestamps = false;
    protected $fillable = [
        'Skill',
        'School',
        'Experience'
    ];

    public function users()
    {
        return $this->hasMany(Users::class, "CoachExperienceId", "id");
    }
}
