<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    
    protected $table = 'quiz_answer';

    protected $primaryKey = 'id';

    public function quiz() {
    	return $this->belongsTo('App\QuizQuestions', 'quiz_question_id');
    }

}
