<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'pelanggaran';
    protected $primaryKey = 'id_pelanggaran';
    
    protected $fillable = [
        'id_siswa',
        'id_tahunakademik',
        'id_kelas',
         'tgl_pelanggaran',
        'id_petugas'
        
    ];
   
    public function siswa(){
        return $this->BelongsTo(Siswa::class,'id_siswa');
    }
    public function kelas(){
        return $this->BelongsTo(Kelas::class,'id_kelas');
    }
    public function tahunakademik(){
        return $this->BelongsTo(TahunAkademik::class,'id_tahunakademik');
    }
    public function detailpelanggaran(){
        return $this->BelongsTo(detailpelanggaran::class,'id_pelanggaran');
    }
    public function user(){
        return $this->BelongsTo(User::class,'id_petugas');
    }
}
