<?php

use Illuminate\Database\Seeder;

class sessionAttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SessionAttendance::class, 50)->create();
    }
}
