<?php

namespace App\Models;

use App\Models\City;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Salesman;
use App\Models\PaymentTerm;
use App\Models\CustomerType;
use App\Models\CustomerDetailSatu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $with = ['customer_type', 'vendor', 'currency', 'payment_term', 'city', 'country', 'salesman'];

    public function customer_type()
    {
        return $this->belongsTo(CustomerType::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
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

    public function salesman()
    {
        return $this->belongsTo(Salesman::class)->withTrashed();
    }

    public function customer_detail_satu()
    {
        return $this->hasMany(CustomerDetailSatu::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($customer) { // before delete() method call this
            $customer->customer_detail_satu()->each(function ($customer_detail_satu) {
                $customer_detail_satu->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
