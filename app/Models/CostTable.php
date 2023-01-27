<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostTable extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['job_type', 'bisnis_party', 'city'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function job_type()
    {
        return $this->belongsTo(JobType::class)->withTrashed();
    }

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class)->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }

    public function cost_table_detail_satu()
    {
        return $this->hasMany(CostTableD1::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($cost_table) { // before delete() method call this
            $cost_table->cost_table_detail_satu()->each(function ($cost_table_detail_satu) {
                $cost_table_detail_satu->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
