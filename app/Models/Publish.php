<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pengajuanNya()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
}
