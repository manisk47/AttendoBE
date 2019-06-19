<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
    
    public function sessions()
    {
        return $this->hasMany('App\session' , 'courseId');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\teacher' , 'course_teachers', 'courseID','teacherID')->withTimestamps();;
    }
 
    
}
