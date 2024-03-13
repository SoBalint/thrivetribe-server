<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $table = "Training";
    public $timestamps = false;
    protected $fillable = [
        'Name',
        'Text',
        'Type',
        'UploadeDate'
    ];

    public function users()
    {
        return $this->hasMany(Users::class, "FavouriteTrainingId", "id");
    }
}
