<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobMaster extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function sea_ex_job()
    {
        return $this->hasOne(SeaExJob::class);
    }

    public function sea_im_job()
    {
        return $this->hasOne(SeaImJob::class);
    }

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class, 'customer_code', 'code');
    }
}
