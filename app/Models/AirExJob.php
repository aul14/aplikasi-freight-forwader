<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirExJob extends Model
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

    public function air_ex_job_d1()
    {
        return $this->hasOne(AirExJobD1::class)->withTrashed();
    }

    public function ad1()
    {
        return $this->air_ex_job_d1();
    }

    public function air_ex_job_d2()
    {
        return $this->hasMany(AirExJobD2::class)->withTrashed();
    }

    public function ad2()
    {
        return $this->air_ex_job_d2();
    }

    public function air_ex_job_d3()
    {
        return $this->hasOne(AirExJobD3::class)->withTrashed();
    }

    public function ad3()
    {
        return $this->air_ex_job_d3();
    }

    public function air_ex_job_d4()
    {
        return $this->hasMany(AirExJobD4::class)->withTrashed();
    }

    public function ad4()
    {
        return $this->air_ex_job_d4();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($air_ex_job) { // before delete() method call this
            $air_ex_job->job_master()->delete();
            $air_ex_job->air_ex_job_d1()->delete();
            $air_ex_job->air_ex_job_d3()->delete();

            $air_ex_job->air_ex_job_d2()->each(function ($air_ex_job_d2) {
                $air_ex_job_d2->delete(); // <-- direct deletion
            });
            $air_ex_job->air_ex_job_d4()->each(function ($air_ex_job_d4) {
                $air_ex_job_d4->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
