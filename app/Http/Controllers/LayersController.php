<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Layer;
use App\RecipeSub;
use DB;
use Carbon\Carbon;

class LayersController extends Controller
{
    //
  public function __construct()   
     {      
       $this->middleware('auth');  
         }

    public function index()
    {
    	$layers['layers']=Layer::orderBy('id', 'desc')->paginate(3);
    	return view('dashboard.admin-home',$layers);
    }

    public function store(Request $request)
    {
    	$validate=[
'product_name'=> 'required|max:60|min:3|regex:/^[a-zA-Z]+$/u|unique:layers',
'product_price'=> 'required|max:10'
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
      $layer['layer']=Layer::all();
        $validate=[
'product_name'=> 'regex:/^[a-zA-Z ]+$/|unique:layers,product_name,'.$request->id,
'product_price'=> 'required|max:10'
];

$this->validate($request, $validate);

    $input=[
        'id'=>$request->id,
        'product_name'=>$request['product_name'],
        'product_price'=>$request['product_price'],
        
    ];
        Layer::where('id',$request->id)->update($input);
        return redirect('');
    
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
        //$recipe_datas['recipe_datas']=Recipe::all();
       // $recipe_datas['recipe_datas'] = Recipe::orderBy('id', 'desc')->take(5)->get();

     // $recipe_datas['recipe_datas'] = Recipe::paginate(3);

    	return view('dashboard.add-recipe',$layers);
    }
   public function get_product_list(request $request)
   {
   	
   	$price = DB::table("layers")
                    ->where("id",$request->id)->value('product_price');
                 
        return response()->json($price);
   }

   public function prints($id)
   {
      $datas= Recipe::with('RecipeSub')->where('id',$id)->first();
      //echo $datas;

return view('dashboard.print',compact('datas'));
      
   }
    public function delete_recipe_details($id)
   {
     Recipe::where('id',$id)->delete();
        RecipeSub::where('recipe_id',$id)->delete();
     // dd($datas);

return back();
      
   }
   public function pagination()
   {
     $recipe_datas['recipe_datas'] = Recipe::orderBy('id', 'desc')->paginate(3);

      return view('dashboard.recipes',$recipe_datas);


      
   }

      public function report(request $request)
   {
    


    return view('dashboard.report');
   }


public function get_report(request $request)
   {
    
  $from    = Carbon::parse($request->from_date)
                 ->startOfDay()        
                 ->toDateTimeString(); 

$to      = Carbon::parse($request->to_date)
                 ->endOfDay()          
                 ->toDateTimeString();
                // dd($from);
                  $input['input']=[
        'from'=>$request['from_date'],
        'to'=>$request['to_date'],        
    ];

   $recipe_details['recipe_details']= Recipe::whereBetween('created_at', [$from, $to])->get()->toArray();
//dd($input);
      return view('dashboard.report-details',$recipe_details,$input);
  
   }
}
