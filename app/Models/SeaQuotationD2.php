<?php

namespace App\Models;

use App\Models\SeaQuotation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeaQuotationD2 extends Model
{
    use HasFactory;

    protected $table = "sea_quotation_d2";

    // protected $with = ['sea_quotation'];

    public function sea_quotation()
    {
        return $this->belongsTo(SeaQuotation::class);
    }
}
