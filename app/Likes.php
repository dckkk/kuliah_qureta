<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'course_like';

    protected $primaryKey = 'id';

    protected $fillable = ['course_id', 'user_id'];
    
    public function course() {
    	return $this->belongsTo('App\Course', 'course_id');
    }

    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
