<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostTableD1 extends Model
{
    use HasFactory;

    protected $table = "cost_table_d1";

    protected $with = ['cost_table', 'charge_code', 'uom', 'vat_code', 'container', 'currency'];

    public function cost_table()
    {
        return $this->belongsTo(CostTable::class);
    }

    public function charge_code()
    {
        return $this->belongsTo(ChargeCode::class);
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    public function vat_code()
    {
        return $this->belongsTo(VatCode::class);
    }

    public function container()
    {
        return $this->belongsTo(Container::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
