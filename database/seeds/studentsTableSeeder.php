<?php

use Illuminate\Database\Seeder;

class studentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Student::class, 100)->create();
    }
}
