<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\RecipeSub;

class RecipeController extends Controller
{
    // public function __construct()   
     {      
       $this->middleware('auth');  
         }
    
    public function store(Request $request)
    {
        //
      $validate=[
'recipe_name'=> 'required|max:60|min:3',
'recipe_price'=> 'required|max:10',
'product_name'=> 'required|max:60|',
'rate_per_kg'=> 'required|max:10',
'quantity'=> 'required|max:60|',
'rate'=> 'required|max:10'
];

$this->validate($request, $validate);
                
$recipe_entry=Recipe::create(['recipe_name'=>$request->recipe_name,'recipe_price'=>$request->recipe_price])->id;
        for($i=0;$i<=count($request->quantity);$i++)
        {
            if(!empty($request->quantity[$i]))
            {
                $input=[
                  'recipe_id'=>$recipe_entry,
                  'product_name'=>$request->product_name[$i],
                  'rate_per_kg'=>$request->rate_per_kg[$i],
                  'quantity'=>$request->quantity[$i],
                  'rate'=>$request->rate[$i]
                ];
                RecipeSub::create($input);
                unset($input);
            }
        }

    	
    	return	redirect('/recipe-pagination');
    		
}
}