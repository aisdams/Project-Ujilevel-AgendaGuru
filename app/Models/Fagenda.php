<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fagenda extends Model
{
    protected $table = "fagendas";
    protected $primaryKey = "id";

    protected $fillable = [
        'namaguru_id','mapel_id','materi','jenispelajaran','linkpembelajaran','namakelas_id','absensisiswa','documentasi','keterangan','jampembelajaran',
    ];
    
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'namaguru_id','id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'namakelas_id','id');
    }
    
}
