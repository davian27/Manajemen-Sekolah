<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'tb_mapel';
    protected $primaryKey = 'id_mapel';

    public $timestamps = true;

    protected $fillable = ['mapel'];

    public function siswa()
    {
        return $this->hasMany(Guru::class, 'id_mapel', 'id_mapel');
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('mapel', 'LIKE', '%' . $search . '%');
        }

        return $query;
    }
}

