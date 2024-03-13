<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityCentrum extends Model
{
    use HasFactory;
    protected $table = "CityCentrum";
    public $timestamps = false;


    protected $fillable = [
        'PostCode',
        'Name',
        'latitude',
        'longitude'
    ];
}
