<?php

namespace App\Models;

use App\Models\Country;
use App\Models\BisnisParty;
use App\Models\ShippingLine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vessel extends Model
{
    use HasFactory;

    protected $with = ['bisnis_party', 'country', 'shipping_line'];

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function shipping_line()
    {
        return $this->belongsTo(ShippingLine::class);
    }
}
