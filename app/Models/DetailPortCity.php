<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPortCity extends Model
{
    use HasFactory;

    protected $table = "port_d1";

    protected $with = ['port', 'city'];

    public function port()
    {
        return $this->belongsTo(Port::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
