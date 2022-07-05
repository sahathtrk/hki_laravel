<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;
    protected $table = "surveis";

    public function akun(){
    	return $this->belongsTo(Akun::class);
    } 

    public function jawaban(){
    	return $this->hasMany(Jawaban::class);
    } 

    public function pertanyaan(){
    	return $this->hasMany(Pertanyaan::class);
    } 
}
