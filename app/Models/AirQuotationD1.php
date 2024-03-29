<?php

namespace App\Models;

use App\Models\AirQuotation;
use App\Models\AirQuotationSD1;
use App\Models\AirQuotationSD2;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirQuotationD1 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "air_quotation_d1";

    // protected $with = ['air_quotation_s_d1'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function air_quotation()
    {
        return $this->belongsTo(AirQuotation::class)->withTrashed()->withTrashed();
    }

    public function air_quotation_s_d1()
    {
        return $this->belongsTo(AirQuotationSD1::class, 'code', 'air_quotation_d1_code')->withTrashed();
    }

    public function air_quotation_s_d2()
    {
        return $this->hasMany(AirQuotationSD2::class, 'air_quotation_d1_code', 'code')->withTrashed();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($air_quotation_d1) { // before delete() method call this
            $air_quotation_d1->air_quotation_s_d2()->each(function ($air_quotation_s_d2) {
                $air_quotation_s_d2->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
