<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCountrySymbol extends Model
{
    use HasFactory;

    protected $table = "country_d2";

    protected $with = 'country';

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }
}
