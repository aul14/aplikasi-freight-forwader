<?php

namespace App\Models;

use App\Models\Uom;
use App\Models\JobType;
use App\Models\Currency;
use App\Models\Salesman;
use App\Models\Commodity;
use App\Models\BisnisParty;
use App\Models\DeliveryType;
use App\Models\QuotationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = 'quotation_type';
    // protected $with = ['quotation_type', 'job_type', 'bisnis_party', 'salesman', 'currency', 'delivery_type', 'commodity', 'uom', 'payment_term'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function sea_quot()
    {
        return $this->hasOne(SeaQuotation::class)->withTrashed();
    }

    public function quotation_type()
    {
        return $this->belongsTo(QuotationType::class)->withTrashed();
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class)->withTrashed();
    }

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class, 'customer_code', 'code')->withTrashed();
    }

    public function salesman_model()
    {
        return $this->belongsTo(Salesman::class, 'salesman_code', 'code')->withTrashed();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class)->withTrashed();
    }

    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_code', 'type')->withTrashed();
    }

    public function commodity_model()
    {
        return $this->belongsTo(Commodity::class, 'commodity_code', 'code')->withTrashed();
    }

    public function payment_term()
    {
        return $this->belongsTo(PaymentTerm::class, 'term_code', 'code')->withTrashed();
    }

    public function uom_model()
    {
        return $this->belongsTo(Uom::class)->withTrashed();
    }
}
