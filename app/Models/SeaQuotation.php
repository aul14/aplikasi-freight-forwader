<?php

namespace App\Models;

use App\Models\Quotation;
use App\Models\PaymentTerm;
use App\Models\SeaQuotationD1;
use App\Models\SeaQuotationD2;
use App\Models\SeaQuotationSD1;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeaQuotation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // protected $with = ['quotation', 'payment_term'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function payment_term()
    {
        return $this->belongsTo(PaymentTerm::class)->withTrashed();
    }

    public function sea_quotation_d1()
    {
        return $this->hasMany(SeaQuotationD1::class);
    }

    public function sea_quotation_d2()
    {
        return $this->hasMany(SeaQuotationD2::class);
    }

    public function sea_quotation_s_d1()
    {
        return $this->hasMany(SeaQuotationSD1::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($sea_quotation) { // before delete() method call this
            $sea_quotation->sea_quotation_d1()->each(function ($sea_quotation_d1) {
                $sea_quotation_d1->delete(); // <-- direct deletion
            });
            $sea_quotation->sea_quotation_d2()->each(function ($sea_quotation_d2) {
                $sea_quotation_d2->delete();
            });
            $sea_quotation->sea_quotation_s_d1()->each(function ($sea_quotation_s_d1) {
                $sea_quotation_s_d1->delete();
            });
            // do the rest of the cleanup...
        });
    }
}
