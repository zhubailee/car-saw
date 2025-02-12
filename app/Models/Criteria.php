<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $fillable = ['criteria_name','type','weight'];

    public function subcriteria (){
        return $this->hasMany(Subcriteria::class,'idCriteria','id');
    }

    public function calculation (){
        return $this->hasMany(Calculation::class,'idCriteria','id');
    }
}
