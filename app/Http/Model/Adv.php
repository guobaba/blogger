<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'adv';
    protected $primaryKey = 'adv_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
