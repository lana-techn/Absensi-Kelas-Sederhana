<?php

namespace App\Models;

use App\Models\Logkehadiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'jumlah_siswa',
        'bangku_tersisa',
        'rombel'
    ];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'kelas_id');
    }
    public function kelas(){
        return $this->hasMany(Logkehadiran::class);
    }

    public function pengajars()
    {
        return $this->belongsToMany(User::class, 'pengajars', 'kelas_id', 'guru_id');
    }

}
