<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanFormal extends Model
{
    use HasFactory;
    protected $table = "pendidikan_formals";

    public function pendidikan_formal(){
    	return $this->belongsTo(PendidikanFormal::class);
    } 
}
