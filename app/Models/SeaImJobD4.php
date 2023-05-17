<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeaImJobD4 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sea_im_job_d4";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function sea_im_job()
    {
        return $this->belongsTo(SeaImJob::class);
    }
}
