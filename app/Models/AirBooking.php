<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirBooking extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function air_book_d1()
    {
        return $this->hasMany(AirBookingD1::class)->withTrashed();
    }

    public function a_d1()
    {
        return $this->air_book_d1();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($air_book) { // before delete() method call this
            $air_book->air_book_d1()->each(function ($air_book_d1) {
                $air_book_d1->delete(); // <-- direct deletion
            });

            // do the rest of the cleanup...
        });
    }
}
