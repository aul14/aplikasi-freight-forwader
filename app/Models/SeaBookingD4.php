<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeaBookingD4 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sea_booking_d4";

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function sea_book()
    {
        return $this->belongsTo(SeaBooking::class)->withTrashed();
    }
}
