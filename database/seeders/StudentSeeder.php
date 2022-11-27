<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        $student_data = [];
        for ($i = 1; $i <= 10; $i++) {
            $student_data[] = [
                'email' => sprintf('member%02d@example.com', $i),
                'password' => sprintf('pass%04d', $i),
            ];
        }

        foreach($student_data as $data) {
            $student = new Student();
            $student->email = $data['email'];
            $student->password = Hash::make($data['password']);
            $student->save();
        }
    }
}

