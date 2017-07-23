<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    protected $table='sub';
    protected $primaryKey='sub_id';
    protected $guarded = [];
}
