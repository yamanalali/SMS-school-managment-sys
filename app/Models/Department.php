<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'department_name',
        'head_of_department',
        'start_date',
        'number_of_students',
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    
}
