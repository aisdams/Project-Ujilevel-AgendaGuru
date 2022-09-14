<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = [
        'id','namakelas','namaguru_id','namaguru','walikelas'
    ];
    protected $primaryKey = "id";
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'namaguru_id','id');
    }
}
