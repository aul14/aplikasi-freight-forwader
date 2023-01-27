<?php

namespace App\Models;

use App\Models\Port;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['country', 'port'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }

    public function port()
    {
        return $this->belongsTo(Port::class)->withTrashed();
    }
}
