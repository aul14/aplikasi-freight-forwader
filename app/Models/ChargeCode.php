<?php

namespace App\Models;

use App\Models\Uom;
use App\Models\JobType;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChargeCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "charge_code";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $with = ['job_type', 'currency', 'uom', 'wt_code', 'vat_code'];

    public function job_type()
    {
        return $this->belongsTo(JobType::class)->withTrashed();
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class)->withTrashed();
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class)->withTrashed();
    }

    public function wt_code()
    {
        return $this->belongsTo(WtCode::class)->withTrashed();
    }

    public function vat_code()
    {
        return $this->belongsTo(VatCode::class)->withTrashed();
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
