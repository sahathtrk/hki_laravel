<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grejawi extends Model
{
    use HasFactory;
    protected $table = "grejawis";

    public function akun(){
    	return $this->belongsTo(Akun::class);
    } 
}
