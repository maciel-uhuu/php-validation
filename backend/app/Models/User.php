<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'document',
        'address',
        'phone',
        'status',
        'password',
        'type',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
    ];
}
