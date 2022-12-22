<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDetailSatu extends Model
{
    use HasFactory;

    protected $table = "vendor_detail_1";

    protected $with = 'vendor';

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
