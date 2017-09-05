<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $table = 'courses';

    protected $primaryKey = 'id';

    public function topics() {
    	return $this->belongsTo('App\Topics', 'topic_id');
    }

    public function teachers() {
    	return $this->belongsTo('App\Teachers', 'teacher_id');
    }

}
