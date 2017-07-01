<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
