<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestions extends Model
{
    
    protected $table = 'quiz_question';

    protected $primaryKey = 'id';

    public function quiz() {
    	return $this->belongsTo('App\Quiz', 'quiz_id');
    }

    public function quiz_answer() {
    	return $this->hasMany('App\Answer');
    }
    
}
