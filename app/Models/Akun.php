<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $table = "akuns";
    
    public function anak(){
    	return $this->hasMany(Anak::class);
    }

    public function grejawi(){
    	return $this->hasMany(Grejawi::class);
    }

    public function pendidikan_formal(){
    	return $this->hasMany(PendidikanFormal::class);
    }

    public function pendidikan_informal(){
    	return $this->hasMany(PendidikanInformal::class);
    }

    public function suami_istri(){
    	return $this->hasMany(SuamiIstri::class);
    }

    public function survei(){
    	return $this->hasMany(Survei::class);
    }

    public function jawaban(){
    	return $this->hasMany(Jawaban::class);
    }
}
