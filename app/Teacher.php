<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

    public function sessions()
    {
        return $this->hasMany('App\session' , 'teacherId');
    }  

    public function courses()
    {
        return $this->belongsToMany('App\course' , 'course_teachers', 'teacherID','courseID')->withTimestamps();;
    }

}
