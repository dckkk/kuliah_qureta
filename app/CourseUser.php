<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    
    protected $table = 'course_users';

    protected $primaryKey = 'id';

    protected $fillable = ['course_id','email'];

    public function users() {
    	return $this->belongsTo('App\User', 'email','email');
    }

}
