<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use App\Models\BisnisParty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Airline extends Model
{
    use HasFactory;

    protected $with = ['bisnis_party', 'city', 'country'];

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
