<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirQuotationSD2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "air_quotation_s_d2";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function air_quotation()
    {
        return $this->belongsTo(AirQuotation::class)->withTrashed();
    }

    public function air_quotation_d1()
    {
        return $this->belongsTo(AirQuotationD1::class, 'code', 'air_quotation_d1_code')->withTrashed();
    }

    public function vat()
    {
        return $this->belongsTo(VatCode::class, 'vat_code_s_d2', 'code')->withTrashed();
    }
}
