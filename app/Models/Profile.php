<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spiritix\LadaCache\Database\LadaCacheTrait;

class Profile extends Model
{
    use HasFactory, LadaCacheTrait;

    protected $fillable = [
        'user_id',
        'username',
        'avatar',
        'birthdate',
        'bio',
        'last_online',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
