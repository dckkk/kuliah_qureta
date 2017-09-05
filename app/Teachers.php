<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{

    protected $table = 'teachers';

    protected $primaryKey = 'id';

    public function course() {
    	return $this->hasMany('App\Course');
    }

}
