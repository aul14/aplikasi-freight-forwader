<?php

namespace App\Models;

use App\Models\CompanyDetailSatu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $table = "company";

    protected $with = 'currency';

    public function company_detail_satu()
    {
        return $this->hasMany(CompanyDetailSatu::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class)->withTrashed();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($company) { // before delete() method call this
            $company->company_detail_satu()->each(function ($company_detail_satu) {
                $company_detail_satu->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}
