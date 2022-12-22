<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetailSatu extends Model
{
    use HasFactory;

    protected $table = "customer_detail_1";

    protected $with = 'customer';

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
