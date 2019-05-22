<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $fillable = [
        'work_name',
        'status',
        'content',
        'user_id'
    ];
}
