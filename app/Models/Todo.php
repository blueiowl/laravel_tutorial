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

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
