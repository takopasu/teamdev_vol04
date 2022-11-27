<?php

namespace Database\Seeders;

use App\Models\Mentor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mentor::truncate();

        $mentors_data = [];
        for ($i = 1; $i <= 10; $i++) {
            $mentors_data[] = [
                'userid' => sprintf('admin%03d', $i),
                'password' => sprintf('pass%04d', $i),
            ];
        }

        foreach($mentors_data as $data) {
            $mentor = new Mentor();
            $mentor->userid = $data['userid'];
            $mentor->password = Hash::make($data['password']);
            $mentor->save();
        }
    }
}