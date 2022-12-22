<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyDetailSatu extends Model
{
    protected $table = "currency_d1";

    protected $with = 'currency';

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    use HasFactory;
}
