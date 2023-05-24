<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirImJobD3 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "air_im_job_d3";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function air_im_job()
    {
        return $this->belongsTo(AirImJob::class)->withTrashed();
    }
}
