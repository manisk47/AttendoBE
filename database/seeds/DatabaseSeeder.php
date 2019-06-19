<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CoursesTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(courseTeachersTableSeeder::class);
        $this->call(studentsTableSeeder::class);
        $this->call(sessionsTableSeeder::class);
        $this->call(sessionAttendancesTableSeeder::class);

    }
}
