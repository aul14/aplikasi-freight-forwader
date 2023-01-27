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

class Quotation extends Model
{
    use HasFactory;

    protected $with = ['quotation_type', 'job_type', 'bisnis_party', 'salesman', 'currency', 'delivery_type', 'commodity', 'uom'];

    public function quotation_type()
    {
        return $this->belongsTo(QuotationType::class);
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class);
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class);
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }
}
