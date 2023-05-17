<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirQuotationD2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "air_quotation_d2";

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

    public function vat()
    {
        return $this->belongsTo(VatCode::class, 'vat_code', 'code')->withTrashed();
    }
}
