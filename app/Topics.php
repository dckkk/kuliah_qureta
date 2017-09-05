<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    
    protected $table = 'topics';

    protected $primaryKey = 'id';

    public function course() {
    	return $this->hasMany('App\Course');
    }
    
}
