<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecyclingPoint extends Model
{
    protected $table = "recycling_points";
    protected $fillable = ['type_of_garbage', 'opening_time', 'closing_time'];
}
