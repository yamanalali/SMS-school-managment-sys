<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $policy = SubjectPolicy::class;

    protected $fillable = [
        'subject_name',
        'subject_code',
        'description',
        'hours',
        'instructor',
        'class_schedule',
        'start_date',
        'end_date',
        'maximum_capacity',
        'available_seats',
        'textbook',
        'exam_schedule',
        'pass_mark',
        'head_of_department',
        'department_name',
        'course_fee',
        'classroom',
        'language',
        'online_availability',
        'class_duration',
        'exam_format',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
