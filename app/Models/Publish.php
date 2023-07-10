<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;
    public $tgl_mulai, $tgl_selesai;
    protected $guarded = [];
    public function pengajuanNya()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }
    public function jenisDokument()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_dokumen_id');
    }
}
