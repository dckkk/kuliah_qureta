<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestions extends Model
{
    
    protected $table = 'quiz_questions';

    protected $primaryKey = 'id';

    protected $fillable = ['quiz_id', 'order', 'question'];

    public function quiz() {
    	return $this->belongsTo('App\Quiz', 'quiz_id');
    }

    public function quiz_answer() {
    	return $this->hasMany('App\QuizAnswer');
    }
    
}
