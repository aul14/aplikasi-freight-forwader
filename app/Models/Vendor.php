<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $with = ['vendor_type', 'customer', 'currency', 'payment_term', 'vat_code', 'city', 'country'];

    public function vendor_type()
    {
        return $this->belongsTo(VendorType::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class)->withTrashed();
    }

    public function payment_term()
    {
        return $this->belongsTo(PaymentTerm::class)->withTrashed();
    }

    public function vat_code()
    {
        return $this->belongsTo(VatCode::class)->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }


    public function vendor_detail_satu()
    {
        return $this->hasMany(VendorDetailSatu::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($vendor) { // before delete() method call this
            $vendor->vendor_detail_satu()->each(function ($vendor_detail_satu) {
                $vendor_detail_satu->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
