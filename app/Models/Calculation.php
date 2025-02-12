<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;
    protected $fillable = ['idAlternative','idCriteria','value'];

    public function alternative (){
        $this->belongsTo(Alternative::class,'idAlternative','id');
    }

    public function criteria (){
        $this->belongsTo(Criteria::class,'idCriteria','id');
    }
}
