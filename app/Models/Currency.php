<?php

namespace App\Models;

use App\Models\CurrencyDetailSatu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    protected $table = "currency";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function currency_detail_satu()
    {
        return $this->hasMany(CurrencyDetailSatu::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($currency) { // before delete() method call this
            $currency->currency_detail_satu()->each(function ($currency_detail_satu) {
                $currency_detail_satu->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }

    use HasFactory;
}
