<?php

namespace App\Models;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SystemNumbering extends Model
{
    use HasFactory;

    protected $table = "system_numbering";

    protected $with = 'module';

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
