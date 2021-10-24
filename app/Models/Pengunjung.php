<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;
    protected $table = 'tb_pengunjung';
    protected $primaryKey = 'id_pengunjung';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pengunjung','id_ow','tanggal','jlh_pengunjung'];
}
