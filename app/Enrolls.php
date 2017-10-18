<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolls extends Model
{
    protected $table = 'course_users';

    protected $primaryKey = 'id';

    protected $fillable = ['course_id', 'email'];
    
    public function course() {
    	return $this->belongsTo('App\Course', 'course_id');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'email');
    }

}
