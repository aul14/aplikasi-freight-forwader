<?php

namespace App\Models;

use App\Models\Country;
use App\Models\BisnisParty;
use App\Models\ShippingLine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vessel extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['bisnis_party', 'country', 'shipping_line'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class)->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }

    public function shipping_line()
    {
        return $this->belongsTo(ShippingLine::class)->withTrashed();
    }
}
