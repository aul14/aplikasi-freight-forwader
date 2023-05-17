<?php

namespace App\Models;

use App\Models\JobMaster;
use App\Models\SeaExJobD1;
use App\Models\SeaExJobD2;
use App\Models\SeaExJobD3;
use App\Models\SeaExJobD4;
use App\Models\SeaExJobD5;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeaExJob extends Model
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

    public function sea_ex_job_d1()
    {
        return $this->hasOne(SeaExJobD1::class)->withTrashed();
    }

    public function s_d1()
    {
        return $this->sea_ex_job_d1();
    }

    public function sea_ex_job_d2()
    {
        return $this->hasOne(SeaExJobD2::class)->withTrashed();
    }

    public function s_d2()
    {
        return $this->sea_ex_job_d2();
    }

    public function sea_ex_job_d3()
    {
        return $this->hasMany(SeaExJobD3::class)->withTrashed();
    }

    public function s_d3()
    {
        return $this->sea_ex_job_d3();
    }

    public function sea_ex_job_d4()
    {
        return $this->hasOne(SeaExJobD4::class)->withTrashed();
    }

    public function s_d4()
    {
        return $this->sea_ex_job_d4();
    }

    public function sea_ex_job_d5()
    {
        return $this->hasMany(SeaExJobD5::class)->withTrashed();
    }

    public function s_d5()
    {
        return $this->sea_ex_job_d5();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($sea_ex_job) { // before delete() method call this
            $sea_ex_job->job_master()->delete();
            $sea_ex_job->sea_ex_job_d1()->delete();
            $sea_ex_job->sea_ex_job_d2()->delete();
            $sea_ex_job->sea_ex_job_d4()->delete();

            $sea_ex_job->sea_ex_job_d5()->each(function ($sea_ex_job_d5) {
                $sea_ex_job_d5->delete(); // <-- direct deletion
            });
            $sea_ex_job->sea_ex_job_d3()->each(function ($sea_ex_job_d3) {
                $sea_ex_job_d3->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
