<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // 
    protected $table = 'recipes';
    protected $guarded = [];

    public function RecipeSub()
    {
    	return $this->hasMany('App\RecipeSub','recipe_id','id');
    }
    public function Report()
    {
    	return $this->hasMany('App\RecipeSub','created_at','created_at');
    }
}
