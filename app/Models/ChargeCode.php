<?php

namespace App\Models;

use App\Models\Uom;
use App\Models\JobType;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChargeCode extends Model
{
    use HasFactory;

    protected $table = "charge_code";

    protected $with = ['job_type', 'currency', 'uom', 'wt_code', 'vat_code'];

    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    public function wt_code()
    {
        return $this->belongsTo(WtCode::class);
    }

    public function vat_code()
    {
        return $this->belongsTo(VatCode::class);
    }

    public function charge_code_detail_satu()
    {
        return $this->hasMany(ChargeCodeDetail1::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($charge_code) { // before delete() method call this
            $charge_code->charge_code_detail_satu()->each(function ($charge_code_detail_satu) {
                $charge_code_detail_satu->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
