<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDokumen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function perjanjianTipe()
    {
        return $this->belongsTo(TipePerjanjian::class, 'tipe_perjanjian_id');
    }
}
