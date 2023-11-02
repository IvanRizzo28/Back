<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conctact extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function rubric(){
        return $this->belongsTo(Rubric::class);
    }
}
