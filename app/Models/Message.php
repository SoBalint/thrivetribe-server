<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = "MessageBoard";
    public $timestamps = false;
    protected $fillable = [
        'Text',
        'ShareDate',
        'UserId'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, "UserId", "id");
    }
}
