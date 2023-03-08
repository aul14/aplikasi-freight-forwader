<?php

namespace App\Models;

use App\Models\Quotation;
use App\Models\AirQuotationD1;
use App\Models\AirQuotationD2;
use App\Models\AirQuotationSD1;
use App\Models\AirQuotationSD2;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirQuotation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class)->withTrashed();
    }

    public function air_quotation_d1()
    {
        return $this->hasMany(AirQuotationD1::class)->withTrashed();
    }

    public function air_quotation_d2()
    {
        return $this->hasMany(AirQuotationD2::class)->withTrashed();
    }

    public function air_quotation_s_d1()
    {
        return $this->hasMany(AirQuotationSD1::class)->withTrashed();
    }

    public function air_quotation_s_d2()
    {
        return $this->hasMany(AirQuotationSD2::class)->withTrashed();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($air_quotation) { // before delete() method call this
            $air_quotation->air_quotation_d1()->each(function ($air_quotation_d1) {
                $air_quotation_d1->delete(); // <-- direct deletion
            });
            $air_quotation->air_quotation_d2()->each(function ($air_quotation_d2) {
                $air_quotation_d2->delete();
            });
            $air_quotation->air_quotation_s_d1()->each(function ($air_quotation_s_d1) {
                $air_quotation_s_d1->delete();
            });
            $air_quotation->air_quotation_s_d2()->each(function ($air_quotation_s_d2) {
                $air_quotation_s_d2->delete();
            });
            // do the rest of the cleanup...
        });
    }
}
