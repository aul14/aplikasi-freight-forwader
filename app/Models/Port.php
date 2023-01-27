<?php

namespace App\Models;

use App\Models\City;
use App\Models\Simbol;
use App\Models\Country;
use App\Models\NoOfDay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Port extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = 'country';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function detail_port_city()
    {
        return $this->hasMany(DetailPortCity::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }

    // this is a recommended way to declare event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($port) { // before delete() method call this
            $port->detail_port_city()->each(function ($detail_port_city) {
                $detail_port_city->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
