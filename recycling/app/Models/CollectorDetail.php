<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectorDetail extends Model
{
    protected $table = "collector_details";
    protected $fillable = ['recycling_point_id', 'collector_id'];
}
