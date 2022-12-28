<?php

namespace App\Models;

use App\Models\City;
use App\Models\JobType;
use App\Models\BisnisParty;
use App\Models\ChargeTableD1;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChargeTable extends Model
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

    public function charge_table_detail_satu()
    {
        return $this->hasMany(ChargeTableD1::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($charge_table) { // before delete() method call this
            $charge_table->charge_table_detail_satu()->each(function ($charge_table_detail_satu) {
                $charge_table_detail_satu->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
