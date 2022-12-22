<?php

namespace App\Models;

use App\Models\Port;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailCountryPort extends Model
{
    use HasFactory;

    protected $table = "country_d1";

    protected $with = ['country', 'port'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function port()
    {
        return $this->belongsTo(Port::class);
    }
}
