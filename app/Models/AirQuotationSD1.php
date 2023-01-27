<?php

namespace App\Models;

use App\Models\AirQuotation;
use App\Models\AirQuotationD1;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AirQuotationSD1 extends Model
{
    use HasFactory;

    protected $table = "air_quotation_s_d1";

    public function air_quotation()
    {
        return $this->belongsTo(AirQuotation::class);
    }

    public function air_quotation_d1()
    {
        return $this->belongsTo(AirQuotationD1::class, 'code', 'air_quotation_d1_code');
    }
}
