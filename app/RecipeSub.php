<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeSub extends Model
{
    //
    protected $table = 'recipe_subs';
    protected $guarded = [];

    public function Recipe()
    {
    	return $this->belongsTo('App\Recipe');
    }
}
