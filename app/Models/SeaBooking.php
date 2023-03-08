<?php

namespace App\Models;

use App\Models\SeaBookingD1;
use App\Models\SeaBookingD2;
use App\Models\SeaBookingD3;
use App\Models\SeaBookingD4;
use App\Models\SeaBookingD5;
use App\Models\SeaBookingD6;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeaBooking extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function sea_book_d1()
    {
        return $this->hasOne(SeaBookingD1::class)->withTrashed();
    }

    public function s_d1()
    {
        return $this->sea_book_d1();
    }

    public function sea_book_d2()
    {
        return $this->hasOne(SeaBookingD2::class)->withTrashed();
    }

    public function s_d2()
    {
        return $this->sea_book_d2();
    }

    public function sea_book_d3()
    {
        return $this->hasOne(SeaBookingD3::class)->withTrashed();
    }

    public function s_d3()
    {
        return $this->sea_book_d3();
    }

    public function sea_book_d4()
    {
        return $this->hasOne(SeaBookingD4::class)->withTrashed();
    }

    public function s_d4()
    {
        return $this->sea_book_d4();
    }

    public function sea_book_d5()
    {
        return $this->hasOne(SeaBookingD5::class)->withTrashed();
    }

    public function s_d5()
    {
        return $this->sea_book_d5();
    }

    public function sea_book_d6()
    {
        return $this->hasMany(SeaBookingD6::class)->withTrashed();
    }

    public function s_d6()
    {
        return $this->sea_book_d6();
    }

    // this is the recommended way for declaring event handlers
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($sea_book) { // before delete() method call this
            $sea_book->sea_book_d6()->each(function ($sea_book_d6) {
                $sea_book_d6->delete(); // <-- direct deletion
            });

            $sea_book->sea_book_d5()->delete();
            $sea_book->sea_book_d4()->delete();
            $sea_book->sea_book_d3()->delete();
            $sea_book->sea_book_d2()->delete();
            $sea_book->sea_book_d1()->delete();

            // do the rest of the cleanup...
        });
    }
}
