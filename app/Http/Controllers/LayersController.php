<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Layer;
use DB;

class LayersController extends Controller
{
    //
    public function index()
    {
    	$layers['layers']=Layer::all();
    	return view('dashboard.admin-home',$layers);
    }

    public function store(Request $request)
    {
    	$validate=[
'product_name'=> 'required|max:60|min:3|unique:layers',
'product_price'=> 'required|max:4'
];

$this->validate($request, $validate);
    	$layer =new Layer;
        
       	$layer->product_name=$request->product_name;
    	$layer->product_price=$request->product_price;
        


    	if($layer->save())
    	{
    		return back();
    	}
    	else
    	{
    		echo "inserted failed";
    	}
    	
    }

    public function edit($id)
    {
          $layer['layer']=Layer::find($id);
          return view('dashboard.edit',$layer);
    }
    public function update(Request $request,$id)

    {
        $validate=[
'product_name'=> 'required|max:60|min:3|unique:layers',
'product_price'=> 'required|max:4'
];

$this->validate($request, $validate);

    $input=[
        'id'=>$request->id,
        'product_name'=>$request['product_name'],
        'product_price'=>$request['product_price'],
        
    ];
        Layer::where('id',$request->id)->update($input);
        return redirect('/admin');
    
    }
     public function delete($id)
    {
    $layer= Layer::find($id);
    $layer->delete();

    return back();
    }

     public function recipe()
    {
    	$layers['layers']=Layer::all();
    	return view('dashboard.add-recipe',$layers);
    }
   public function get_product_list($id)
   {
   	dd($id); 
   	$states = DB::table("layers")
                    ->where("id",$request->pid)
                    ->lists("product_name","product_price");
        return response()->json($states);
   }

}