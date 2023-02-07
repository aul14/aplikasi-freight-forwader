<?php

namespace App\Models;

use App\Models\SeaQuotation;
use App\Models\SeaQuotationD1;
use Yajra\DataTables\Html\SearchPane;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeaQuotationSD1 extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = "sea_quotation_s_d1";

    public function sea_quotation()
    {
        return $this->belongsTo(SeaQuotation::class)->withTrashed();
    }

    public function vat()
    {
        return $this->belongsTo(VatCode::class, 'vat_code', 'code')->withTrashed();
    }

    public function sea_quotation_d1()
    {
        return $this->belongsTo(SeaQuotationD1::class, 'code', 'sea_quotation_d1_code')->withTrashed();
    }
}
