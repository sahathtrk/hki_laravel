<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = "jawabans";

    public function pertanyaan(){
    	return $this->belongsTo(Pertanyaan::class);
    } 

    public function survei(){
    	return $this->belongsTo(Survei::class);
    } 

    public function akun(){
    	return $this->belongsTo(Akun::class);
    } 
}
