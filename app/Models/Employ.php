<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employ extends Authenticatable
{
    use HasFactory;

    protected $table = 'employ';
    protected $fillable = [
        'user_id',
        'password',
        'email',
        'is_created',
    ];
}
