<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    protected $table = "collectors";
    protected $fillable = ['name', 'days_to_pick_up'];
}
