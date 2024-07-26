<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis', 'image', 'nama', 'jenis_kelamin', 'agama', 'phone', 'email', 'id_kelas', 'id_jurusan', 'id_organisasi', 'id_ekskul', 'alamat'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi');
    }

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class, 'id_ekskul');
    }
}
