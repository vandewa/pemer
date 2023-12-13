<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjanjian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenisDokument()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_dokumen_id');
    }
}
