<?php


namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            [
                'subject_name' => 'Mathematics',
                'subject_code' => 'MATH101',
                'description' => 'Introduction to Mathematics',
                'hours' => 60,
                'instructor' => 'John Doe',
                'class_schedule' => 'Monday, Wednesday, Friday',
                'start_date' => '2023-09-01',
                'end_date' => '2023-09-05',
                'maximum_capacity' => 50,
                'available_seats' => 50,
                'textbook' => 'Mathematics textbook',
                'exam_schedule' => '2023-09-05',
                'pass_mark' => 70,
                'head_of_department' => 'Jane Smith',
                'course_fee' => 1000,
                'classroom' => 'Room 101',
                'language' => 'English',
                'online_availability' => 0,
                'class_duration' => '2 hours',
                'exam_format' => 'Multiple Choice',
            ],
            // Add additional subjects here
            [
                'subject_name' => 'English',
                'subject_code' => 'ENG101',
                'description' => 'Introduction to English',
                'hours' => 45,
                'instructor' => 'Jane Smith',
                'class_schedule' => 'Tuesday, Thursday',
                'start_date' => '2023-09-01',
                'end_date' => '2023-09-07',
                'maximum_capacity' => 60,
                'available_seats' => 60,
                'textbook' => 'English textbook',
                'exam_schedule' => '2023-09-07',
                'pass_mark' => 60,
                'head_of_department' => 'John Doe',
                'course_fee' => 1200,
                'classroom' => 'Room 102',
                'language' => 'English',
                'online_availability' => 1,
                'class_duration' => '1.5 hours',
                'exam_format' => 'Essay',
            ],
            [
                'subject_name' => 'Physics',
                'subject_code' => 'PHY101',
                'description' => 'Introduction to Physics',
                'hours' => 50,
                'instructor' => 'Sarah Johnson',
                'class_schedule' => 'Monday, Wednesday',
                'start_date' => '2023-09-01',
                'end_date' => '2023-09-06',
                'maximum_capacity' => 40,
                'available_seats' => 40,
                'textbook' => 'Physics textbook',
                'exam_schedule' => '2023-09-06',
                'pass_mark' => 65,
                'head_of_department' => 'David Wilson',
                'course_fee' => 1100,
                'classroom' => 'Room 103',
                'language' => 'English',
                'online_availability' => 1,
                'class_duration' => '2 hours',
                'exam_format' => 'Problem-solving',
            ],
            [
                'subject_name' => 'History',
                'subject_code' => 'HIS101',
                'description' => 'Introduction to History',
                'hours' => 40,
                'instructor' => 'Michael Thompson',
                'class_schedule' => 'Tuesday, Friday',
                'start_date' => '2023-09-01',
                'end_date' => '2023-09-08',
                'maximum_capacity' => 30,
                'available_seats' => 30,
                'textbook' => 'History textbook',
                'exam_schedule' => '2023-09-08',
                'pass_mark' => 55,
                'head_of_department' => 'Emma Davis',
                'course_fee' => 900,
                'classroom' => 'Room 104',
                'language' => 'English',
                'online_availability' => 0,
                'class_duration' => '1.5 hours',
                'exam_format' => 'Essay',
            ],
        ];
    
        DB::table('subjects')->insert($subjects);
    }
}