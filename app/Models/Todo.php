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

    public function getStatusAttribute($value){
        if($value === 1){
            return '未着手';
        }elseif($value === 2){
            return '作業中';
        }else{
            return '完了';
        }
    }
}
