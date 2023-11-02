<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function conctacts(){
        return $this->hasMany(Conctact::class);
    }
}
