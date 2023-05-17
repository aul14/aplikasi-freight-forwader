<?php

namespace App\Models;

use App\Models\JobMaster;
use App\Models\SeaImJobD1;
use App\Models\SeaImJobD2;
use App\Models\SeaImJobD3;
use App\Models\SeaImJobD4;
use App\Models\SeaImJobD5;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeaImJob extends Model
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

    public function sea_im_job_d1()
    {
        return $this->hasOne(SeaImJobD1::class)->withTrashed();
    }

    public function sd1()
    {
        return $this->sea_im_job_d1();
    }

    public function sea_im_job_d2()
    {
        return $this->hasOne(SeaImJobD2::class)->withTrashed();
    }

    public function sd2()
    {
        return $this->sea_im_job_d2();
    }

    public function sea_im_job_d3()
    {
        return $this->hasOne(SeaImJobD3::class)->withTrashed();
    }

    public function sd3()
    {
        return $this->sea_im_job_d3();
    }

    public function sea_im_job_d4()
    {
        return $this->hasMany(SeaImJobD4::class)->withTrashed();
    }

    public function sd4()
    {
        return $this->sea_im_job_d4();
    }

    public function sea_im_job_d5()
    {
        return $this->hasMany(SeaImJobD5::class)->withTrashed();
    }

    public function sd5()
    {
        return $this->sea_im_job_d5();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($sea_im_job) { // before delete() method call this
            $sea_im_job->job_master()->delete();
            $sea_im_job->sea_im_job_d1()->delete();
            $sea_im_job->sea_im_job_d2()->delete();
            $sea_im_job->sea_im_job_d3()->delete();

            $sea_im_job->sea_im_job_d4()->each(function ($sea_im_job_d4) {
                $sea_im_job_d4->delete(); // <-- direct deletion
            });

            $sea_im_job->sea_im_job_d5()->each(function ($sea_im_job_d5) {
                $sea_im_job_d5->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
