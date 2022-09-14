<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Fagenda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    protected $table = "teachers";
    protected $fillable = [
        'id','namaguru','mapel'
    ];
    
    protected $primaryKey = "id";
    use HasFactory;
    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
    public function fagenda(){
        return $this->hasMany(Fagenda::class);
    }
}