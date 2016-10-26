<?php
/**
 * Created by PhpStorm.
 * User: snake
 * Date: 26.10.16
 * Time: 15:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Task extends Eloquent{
    protected $table = 'tasks';

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}