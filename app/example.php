<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class example extends Model
{
    //
    public $table = "example";

    protected $fillable = [
        'work_name',
        'status',
        'content',
        'user_id'
    ];
}