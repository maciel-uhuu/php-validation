<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Client extends Model
{
    use Sortable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public $sortable = ['id', 'name', 'email', 'active'];
}
