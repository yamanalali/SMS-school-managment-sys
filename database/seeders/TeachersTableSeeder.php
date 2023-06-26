<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teachers = [
            [
                'teacher_id' => 'T001',
                'full_name' => 'John Doe',
                'gender' => 'Male',
                'date_of_birth' => '1990-05-15',
                'mobile' => '1234567890',
                'joining_date' => '2022-01-01',
                'qualification' => 'M.Sc.',
                'experience' => '5 years',
                'username' => 'john123',
                'address' => '123 Main St',
                'city' => 'New York',
                'state' => 'NY',
                'zip_code' => '10001',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'teacher_id' => 'T002',
                'full_name' => 'Jane Smith',
                'gender' => 'Female',
                'date_of_birth' => '1985-09-20',
                'mobile' => '9876543210',
                'joining_date' => '2021-03-15',
                'qualification' => 'B.Ed.',
                'experience' => '8 years',
                'username' => 'jane456',
                'address' => '456 Elm St',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'zip_code' => '90001',
                'country' => 'USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('teachers')->insert($teachers);
    }
    }

