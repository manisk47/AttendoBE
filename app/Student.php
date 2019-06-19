<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    
    public function sessions()
    {
        return $this->belongsToMany('App\session' , 'session_attendances', 'studentID','sessionID')->withPivot('attended')->withTimestamps();;
    }
}
