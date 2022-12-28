<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostTable extends Model
{
    use HasFactory;

    protected $with = ['job_type', 'bisnis_party', 'city'];

    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
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
