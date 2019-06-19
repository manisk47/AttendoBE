<?php

use Illuminate\Database\Seeder;

class courseTeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CourseTeacher::class, 50)->create();
    }
}
