<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyDetailSatu extends Model
{
    use HasFactory;

    protected $table = "company_d1";

    protected $with = ['company', 'city', 'country'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }
}
