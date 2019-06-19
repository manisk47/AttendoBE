<?php

/*@var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$courseIDs = DB::table('courses')->pluck('id');
$teacherIDs= DB::table('teachers')->pluck('id');
$studentIDs= DB::table('students')->pluck('id');
$sessionIDs= DB::table('sessions')->pluck('id');


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Course::class, function (Faker $faker) {
    $firstLetter = $faker->randomletter;
    $rest = $faker->numberBetween($min= 1,$max= 1000);
    $courseCode = strtoupper($firstLetter) . $rest;
    
    return [
        'courseName' => $faker->randomElement($array = array ('Database','Datawarehouse','CS','IS','DS','IT')),
        'courseCode' => $courseCode,
        'courseType' => $faker->randomElement($array = array ('Lecture','Lab','Section'))

    ];
});

$factory->define(App\Teacher::class, function (Faker $faker) {
    
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->email,
        'password' => $faker->password

    ];
});

$factory->define(App\CourseTeacher::class, function (Faker $faker) {
    $courseIDs = DB::table('courses')->pluck('id');
    $teacherIDs= DB::table('teachers')->pluck('id');

    return [
        'courseID' => $faker->randomelement($courseIDs),
        'teacherID' => $faker->randomelement($teacherIDs)

    ];
});

$factory->define(App\Session::class, function (Faker $faker) {
    $courseIDs = DB::table('courses')->pluck('id');
    $teacherIDs= DB::table('teachers')->pluck('id');
    return [
        'Week' => $faker->numberBetween($min= 1,$max= 15),
        'sessionTime' => $faker->dateTime($max = 'now', $timezone = null),
        'courseID' => $faker->randomelement($courseIDs),
        'teacherID' => $faker->randomelement($teacherIDs)

    ];
});

$factory->define(App\Student::class, function (Faker $faker) {
    
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'level'=> $faker->numberBetween($min= 1,$max= 4),
        'academicID'=> $faker->randomElement($array = array ('20150185','20150108','20150232','20150183','20150128','20150222')),
        'email' => $faker->unique()->email,
        'password' => $faker->password
    ];

});

$factory->define(App\SessionAttendance::class, function (Faker $faker) {
    $studentIDs= DB::table('students')->pluck('id');
    $sessionIDs= DB::table('sessions')->pluck('id');
    return [
        'sessionID' => $faker->randomelement($sessionIDs),
        'studentID' => $faker->randomelement($studentIDs),
        'attended' => $faker->boolean(50)

    ];
});
