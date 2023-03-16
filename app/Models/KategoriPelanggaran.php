<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPelanggaran extends Model
{
    use HasFactory;
    protected $table = 'kategoripelanggaran';
    protected $primaryKey = 'id_katpel';
    
    protected $fillable = [
        'nama_pelanggaran',
        'poin',
        'status'
        
    ];
    public function pelanggaran(){
        return $this->hasMany(Pelanggaran::class);
    }
}
