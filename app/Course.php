<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    protected $table = 'courses';

    protected $primaryKey = 'id';

    protected $fillable = ['topic_id', 'teacher_id', 'name', 'description', 'announcement', 'slug', 'url_foto', 'enrolls_start', 'enrolls_end'];

    public function topics() {
    	return $this->belongsTo('App\Topics', 'topic_id');
    }

    public function teachers() {
        return $this->belongsTo('App\Teachers', 'teacher_id1');
    }

    public function teachers2() {
        return $this->belongsTo('App\Teachers', 'teacher_id2');
    }

    public function teachers3() {
    	return $this->belongsTo('App\Teachers', 'teacher_id3');
    }

    public function chapters() {
        return $this->hasMany('App\Chapters');
    }

    public function lectures() {
        return $this->hasMany('App\Lectures');
    }

    public function enrolls() {
        return $this->hasMany('App\Enrolls');
    }

    public function quiz() {
    	return $this->hasMany('App\Quiz');
    }

}
