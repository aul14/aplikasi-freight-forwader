<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirImJob extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function job_master()
    {
        return $this->belongsTo(JobMaster::class)->withTrashed();
    }

    public function jm()
    {
        return $this->job_master();
    }

    public function air_im_job_d1()
    {
        return $this->hasOne(AirImJobD1::class)->withTrashed();
    }

    public function ad1()
    {
        return $this->air_im_job_d1();
    }

    public function air_im_job_d2()
    {
        return $this->hasOne(AirImJobD2::class)->withTrashed();
    }

    public function ad2()
    {
        return $this->air_im_job_d2();
    }

    public function air_im_job_d3()
    {
        return $this->hasMany(AirImJobD3::class)->withTrashed();
    }

    public function ad3()
    {
        return $this->air_im_job_d3();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($air_im_job) { // before delete() method call this
            $air_im_job->job_master()->delete();
            $air_im_job->air_im_job_d1()->delete();
            $air_im_job->air_im_job_d2()->delete();

            $air_im_job->air_im_job_d3()->each(function ($air_im_job_d3) {
                $air_im_job_d3->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
