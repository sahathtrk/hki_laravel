<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuamiIstri extends Model
{
    use HasFactory;
    protected $table = "suami_istris";

    public function suami_istri(){
    	return $this->belongsTo(SuamiIstri::class);
    } 
}
