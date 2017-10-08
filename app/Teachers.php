<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{

    protected $table = 'teachers';

    protected $primaryKey = 'id';

    protected $fillable = ['qureta_id', 'name', 'introduction', 'job', 'url_foto'];

    public function course() {
    	return $this->hasMany('App\Course');
    }

}
