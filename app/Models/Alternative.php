<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;
    protected $fillable = ['car','description'];

    public function calculation (){
        return $this->hasMany(Calculation::class,'idAlternative','id');
    }
}
