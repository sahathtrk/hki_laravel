<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanInformal extends Model
{
    use HasFactory;
    protected $table = "pendidikan_informals";

    public function pendidikan_informal(){
    	return $this->belongsTo(PendidikanInformal::class);
    } 
}
