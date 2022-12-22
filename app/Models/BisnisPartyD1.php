<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BisnisPartyD1 extends Model
{
    use HasFactory;

    protected $table = "bisnis_party_d1";

    protected $with = 'bisnis_party';

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class);
    }
}
