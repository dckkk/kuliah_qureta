<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolls extends Model
{
    protected $table = 'course_users';

    protected $primaryKey = 'id';
    
    public function course() {
    	return $this->belongsTo('App\Course', 'course_id');
    }

}
