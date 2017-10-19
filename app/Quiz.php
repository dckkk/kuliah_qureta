<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	
    protected $table = 'quizes';

    protected $primaryKey = 'id';

    protected $fillable = ['course_id', 'name'];

    public function course() {
    	return $this->belongsTo('App\Course', 'course_id');
    }

    public function quiz_question() {
    	return $this->hasMany('App\QuizQuestions');
    }

}
