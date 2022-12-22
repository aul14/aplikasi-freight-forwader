<?php

namespace App\Models;

use App\Models\City;
use App\Models\Port;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\VatCode;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Salesman;
use App\Models\VendorType;
use App\Models\PaymentTerm;
use App\Models\CustomerType;
use App\Models\BisnisPartyD1;
use App\Models\BisnisPartyD2;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BisnisParty extends Model
{
    use HasFactory;

    protected $table = "bisnis_party";

    protected $with = ['currency', 'payment_term', 'city', 'country', 'port', 'salesman', 'vat_code', 'customer_type', 'vendor_type'];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function payment_term()
    {
        return $this->belongsTo(PaymentTerm::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function port()
    {
        return $this->belongsTo(Port::class);
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }

    public function vat_code()
    {
        return $this->belongsTo(VatCode::class);
    }

    public function customer_type()
    {
        return $this->belongsTo(CustomerType::class);
    }

    public function vendor_type()
    {
        return $this->belongsTo(VendorType::class);
    }

    public function bisnis_party_detail_satu()
    {
        return $this->hasMany(BisnisPartyD1::class);
    }

    public function bisnis_party_detail_dua()
    {
        return $this->hasMany(BisnisPartyD2::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($bisnis_party) { // before delete() method call this
            $bisnis_party->bisnis_party_detail_satu()->each(function ($bisnis_party_detail_satu) {
                $bisnis_party_detail_satu->delete(); // <-- direct deletion
            });
            $bisnis_party->bisnis_party_detail_dua()->each(function ($bisnis_party_detail_dua) {
                $bisnis_party_detail_dua->delete(); // <-- raise another deleting event on Post to delete comments
            });
            // do the rest of the cleanup...
        });
    }
}
