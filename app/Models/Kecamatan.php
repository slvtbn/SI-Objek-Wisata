<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'tb_kecamatan';
    protected $primaryKey = 'id_kecamatan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_kecamatan','nama'];
    public $timestamps = false;

    public function objek_wisata() {
        return $this->hasMany(Objek_Wisata::class);
    }
}
