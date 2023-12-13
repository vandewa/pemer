<?php

namespace App\Models;

use App\Models\Pengajuan;
use App\Models\JenisDokumen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publish extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pengajuanNya()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_dokumen_id');
    }
}
