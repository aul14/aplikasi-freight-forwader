<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WtCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "wt_code";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function vendor_type()
    {
        return $this->belongsTo(VendorType::class);
    }
}
