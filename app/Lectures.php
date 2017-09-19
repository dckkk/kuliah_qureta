<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    protected $table = 'lectures';

    protected $primaryKey = 'id';

    public function chapters() {
    	return $this->belongsTo('App\Chapters', 'chapter_id');
    }

}
