<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'uuid',
        'title',
        'text',
        'user_id',
    ];  

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
