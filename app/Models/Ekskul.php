<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $table = 'tb_ekskul';
    protected $primaryKey = 'id_ekskul';

    public $timestamps = false;

    protected $fillable = [
        'ekskul',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_ekskul', 'id_ekskul');
    }
}
