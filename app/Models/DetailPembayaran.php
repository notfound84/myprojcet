<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    use HasFactory;
    protected $table = 'detailpembayaran';
    protected $primaryKey = 'id_detailpembayaran';
    
    protected $fillable = [
        'id_pembayaran',
        'id_rincianpembayaran'
        
    ];
    public function pembayaran(){
        return $this->BelongsTo(Pembayaran::class,'id_pembayaran');
    }
    public function rincianpembayaran(){
        return $this->BelongsTo(rincianpembayaran::class,'id_rincianpembayaran');
    }
}
