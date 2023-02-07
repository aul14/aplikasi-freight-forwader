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

    protected $with = ['quotation_type', 'job_type', 'bisnis_party', 'salesman', 'currency', 'delivery_type', 'commodity', 'uom'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
        return $this->belongsTo(BisnisParty::class)->withTrashed();
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class)->withTrashed();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class)->withTrashed();
    }

    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class)->withTrashed();
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class)->withTrashed();
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class)->withTrashed();
    }
}
