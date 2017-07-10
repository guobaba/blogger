<?php

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;


class Dis extends Model
                                    
{
   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discuss';
    protected $primaryKey = 'dis_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    
}
