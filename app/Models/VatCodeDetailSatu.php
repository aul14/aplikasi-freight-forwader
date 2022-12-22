<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatCodeDetailSatu extends Model
{
    use HasFactory;

    protected $table = "vat_code_d1";

    protected $with = 'vat_code';

    public function vat_code()
    {
        return $this->belongsTo(VatCode::class);
    }
}
