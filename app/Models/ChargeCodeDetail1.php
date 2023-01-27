<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeCodeDetail1 extends Model
{
    use HasFactory;

    protected $table = "charge_code_d1";

    protected $with = 'charge_code';

    public function charge_code()
    {
        return $this->belongsTo(ChargeCode::class)->withTrashed();
    }
}
