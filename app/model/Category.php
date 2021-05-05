<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'type', 'model',
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
