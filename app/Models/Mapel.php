<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    use SoftDeletes;

    protected $table = 'tb_mapel';
    protected $primaryKey = 'id_mapel';

    public $timestamps = true;

    protected $fillable = ['mapel'];

    protected $dates = ['deleted_at'];

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
