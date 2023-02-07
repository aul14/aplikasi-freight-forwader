<?php

namespace App\Models;

use App\Models\VatCode;
use App\Models\SeaQuotation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeaQuotationD2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sea_quotation_d2";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    // protected $with = ['sea_quotation'];

    public function sea_quotation()
    {
        return $this->belongsTo(SeaQuotation::class)->withTrashed();
    }

    public function vat()
    {
        return $this->belongsTo(VatCode::class, 'vat_code_d2', 'code')->withTrashed();
    }
}
