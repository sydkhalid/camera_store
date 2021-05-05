<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','product_id', 'user_id', 'count','status'
    ];
        /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'created_at','updated_at'
    ];
}
