<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'tb_pemasukan';
    protected $primaryKey = 'id_pemasukan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pemasukan','id_ow','tanggal','jlh_pemasukan'];
}
