<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public function teacher()
    {
        return $this->belongsTo('App\teacher');
    }
    
    public function course()
    {
        return $this->belongsTo('App\course');
    }

    public function students()
    {
        return $this->belongsToMany('App\student' , 'session_attendances', 'sessionID','studentID')->withPivot('attended')->withTimestamps();;
    }
}
