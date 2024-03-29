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
use Illuminate\Database\Eloquent\SoftDeletes;

class BisnisParty extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "bisnis_party";

    protected $with = ['currency', 'country', 'payment_term', 'city', 'port', 'salesman', 'vat_code', 'customer_type', 'vendor_type'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function quotation()
    {
        return $this->hasOne(Quotation::class, 'customer_code', 'code')->withTrashed();
    }

    public function air_book()
    {
        return $this->hasOne(AirBooking::class, 'code_customer', 'code')->withTrashed();
    }

    public function ab()
    {
        return $this->air_book();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class)->withTrashed();
    }

    public function payment_term()
    {
        return $this->belongsTo(PaymentTerm::class)->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }

    public function port()
    {
        return $this->belongsTo(Port::class)->withTrashed();
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class, 'salesman_code', 'code')->withTrashed();
    }

    public function vat_code()
    {
        return $this->belongsTo(VatCode::class)->withTrashed();
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
                $bisnis_party_detail_dua->delete();
            });
            // do the rest of the cleanup...
        });
    }
}
