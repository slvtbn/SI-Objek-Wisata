<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objek_Wisata extends Model
{
    use HasFactory;
    protected $table = "tb_objek";
    protected $primaryKey = "id_ow";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_ow','nama','alamat','id_kecamatan','id_fasilitas','gambar'];

    public function kecamatan() {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
