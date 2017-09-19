<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $table = 'chapters';

    protected $primaryKey = 'id';

    public function course() {
    	return $this->belongsTo('App\Course', 'course_id');
    }

    public function chapter() {
    	return $this->hasMany('App\Lectures');
    }

}
