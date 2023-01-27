<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirQuotationD2 extends Model
{
    use HasFactory;

    protected $table = "air_quotation_d2";

    public function air_quotation()
    {
        return $this->belongsTo(AirQuotation::class)->withTrashed();
    }
}
