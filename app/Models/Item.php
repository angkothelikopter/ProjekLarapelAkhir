<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'laboratory_id',
        'kode_barang',
        'nama_barang',
        'kategori',
        'status',
        'tanggal_masuk',
        'jumlah',
        'keterangan',
    ];

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }
}
