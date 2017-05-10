<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public function competitor(){
    	return $this->belongsTo('App\Competitor');
    }

    public function competitor_secondary(){
    	return $this->belongsTo('App\Competitor', 'competitor_secondary_id');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
