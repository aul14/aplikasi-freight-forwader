<?php

namespace App\Models;

use App\Models\AirQuotation;
use App\Models\AirQuotationD1;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirQuotationSD1 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "air_quotation_s_d1";

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
}
