<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class example extends Model
{
    //
    public $table = "example";

    protected $fillable = [
        'workName',
        'status',
        'content',
        'created_id',
        'created_name',
        'updated_id',
        'updated_name'
    ];
}