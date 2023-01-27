<?php

namespace App\Models;

use App\Models\SeaQuotation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeaQuotationD1 extends Model
{
    use HasFactory;

    protected $table = "sea_quotation_d1";

    // protected $with = ['sea_quotation'];

    public function sea_quotation()
    {
        return $this->belongsTo(SeaQuotation::class)->withTrashed();
    }

    public function sea_quotation_s_d1()
    {
        return $this->hasMany(SeaQuotationSD1::class, 'sea_quotation_d1_code', 'code');
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($sea_quotation_d1) { // before delete() method call this
            $sea_quotation_d1->sea_quotation_s_d1()->each(function ($sea_quotation_s_d1) {
                $sea_quotation_s_d1->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
