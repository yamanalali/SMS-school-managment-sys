<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departments = [
            [
                'department_id' => 'D001',
                'name' => 'Mathematics',
                'head_of_department' => 'John Doe',
                'start_date' => '2023-06-01',
                'number_of_students' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 'D002',
                'name' => 'English',
                'head_of_department' => 'Jane Smith',
                'start_date' => '2023-06-01',
                'number_of_students' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add the remaining departments here
        ];

        DB::table('departments')->insert($departments);
    
    }
}
