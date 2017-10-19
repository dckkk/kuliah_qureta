<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    
    protected $table = 'quiz_answers';

    protected $primaryKey = 'id';

    protected $fillable = ['quiz_question_id', 'order', 'answer'];

    public function quiz() {
    	return $this->belongsTo('App\QuizQuestions', 'quiz_questions_id');
    }

}
