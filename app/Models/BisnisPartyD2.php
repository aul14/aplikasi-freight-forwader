<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BisnisPartyD2 extends Model
{
    use HasFactory;

    protected $table = "bisnis_party_d2";

    protected $with = ['bisnis_party', 'party_type'];

    public function bisnis_party()
    {
        return $this->belongsTo(BisnisParty::class);
    }

    public function party_type()
    {
        return $this->belongsTo(PartyType::class);
    }
}
