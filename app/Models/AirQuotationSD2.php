<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirQuotationSD2 extends Model
{
    use HasFactory;

    protected $table = "air_quotation_s_d2";

    public function air_quotation()
    {
        return $this->belongsTo(AirQuotation::class)->withTrashed();
    }

    public function air_quotation_d1()
    {
        return $this->belongsTo(AirQuotationD1::class, 'code', 'air_quotation_d1_code');
    }
}
