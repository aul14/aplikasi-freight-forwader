<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WtCode extends Model
{
    use HasFactory;

    protected $table = "wt_code";

    public function vendor_type()
    {
        return $this->belongsTo(VendorType::class);
    }
}
