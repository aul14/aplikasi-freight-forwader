<?php

namespace App\Models;

use App\Models\DetailCountryPort;
use App\Models\DetailCountrySymbol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function detail_country_port()
    {
        return $this->hasMany(DetailCountryPort::class);
    }

    public function detail_country_symbol()
    {
        return $this->hasMany(DetailCountrySymbol::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($country) { // before delete() method call this
            $country->detail_country_port()->each(function ($detail_country_port) {
                $detail_country_port->delete(); // <-- direct deletion
            });
            $country->detail_country_symbol()->each(function ($detail_country_symbol) {
                $detail_country_symbol->delete();
            });
            // do the rest of the cleanup...
        });
    }
}
