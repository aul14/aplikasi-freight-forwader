<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VatCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "vat_code";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function vat_code_detail_satu()
    {
        return $this->hasMany(VatCodeDetailSatu::class);
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($vat_code) { // before delete() method call this
            $vat_code->vat_code_detail_satu()->each(function ($vat_code_detail_satu) {
                $vat_code_detail_satu->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
