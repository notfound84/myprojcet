<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPelanggaran extends Model
{
    use HasFactory;
    protected $table = 'detailpelanggaran';
    protected $primaryKey = 'id_detailpelanggaran';
    
    protected $fillable = [
        'id_pelanggaran',
        'id_katpel',
        'keterangan'
        
    ];

     public function kategoripelanggaran(){
        return $this->BelongsTo(KategoriPelanggaran::class,'id_katpel');
    }
    
}
