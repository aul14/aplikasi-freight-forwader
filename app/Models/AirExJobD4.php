<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirExJobD4 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "air_ex_job_d4";
}
