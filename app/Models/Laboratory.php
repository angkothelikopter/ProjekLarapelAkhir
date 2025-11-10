<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lab', 'lokasi', 'deskripsi','penanggung_jawab','foto_penanggung_jawab'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

