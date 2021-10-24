<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'tb_fasilitas';
    protected $primaryKey = 'id_fasilitas';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_fasilitas','keterangan','icon'];
    public $timestamps = false;

    public function objek_wisata() {
        return $this->belongsToMany(Objek_Wisata::class);
    }
}
