<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Question model
class Question extends Model
{
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}