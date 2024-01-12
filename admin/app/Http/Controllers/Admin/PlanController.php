<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Plan;
use App\Models\User;
use App\Models\Category;
use App\Models\MainUser;
use App\Models\PlanCategoryMap;
use DB;
use Validator;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;
use DataTables;
use DateTime;

use Illuminate\Support\Str;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $plans = Plan::latest('plan_id')->paginate(25);
        return view('admin.pages.canopy.plan_mst',get_defined_vars());
    }
    public function addPlan(Request $request)
    {
        // dd($request['category_1']);
        //Dynamic validations
        $categories = Category::all();
        $rules = [];
        foreach($categories as $category) {
            $rules['category_'.$category->category_id] = 'required';
        }
        $rules['client_id'] = 'required';
        $rules['plan_name'] = 'required';
        $request->validate($rules);
        // $validatedData = $request->validated();
        // unset($validatedData[0]); // remove the 0 index
        
        // check plan exist or not
        $plan = Plan::where('plan_name',$request->plan_name)->first();
        if($plan){
            return back()->with('error','Plan with same name already exists');
        }else{
            $Plan = new Plan;
            $Plan->client_id  = $request->client_id;
            $Plan->plan_name  = $request->plan_name;
            $Plan->save();
            foreach($categories as $cat){
                $PlanCategoryMap = new PlanCategoryMap;
                $PlanCategoryMap->plan_id = $Plan->plan_id;	
                $PlanCategoryMap->category_id = $cat->category_id;
                $PlanCategoryMap->category_limit_name = $request['category_'.$cat->category_id];
                $PlanCategoryMap->save();
            }
            return back()->with('message','Plan and their categories values are added successfully');
        }
        
        
        
    }
    public function updatePlan(Request $request,$plan_id)
    {
      
        $categories = Category::all();
        $rules = [];
        foreach($categories as $category) {
            $rules['category_'.$category->category_id] = 'required';
        }
        $rules['client_id'] = 'required';
        $rules['plan_name'] = 'required';
        $request->validate($rules);
       
        
        // check plan exist or not
        $plan = Plan::where('plan_id',$plan_id)->first();
        if($plan){
            
            $Plan = Plan::where('plan_id',$plan_id)->first();
            $Plan->client_id  = $request->client_id;
            $Plan->plan_name  = $request->plan_name;
            $Plan->save();
            foreach($categories as $cat){
                $PlanCategoryMap = PlanCategoryMap::where('plan_id',$Plan->plan_id)->where('category_id',$cat->category_id)->first();
                if($PlanCategoryMap){
                    $PlanCategoryMap->plan_id = $Plan->plan_id;	
                    $PlanCategoryMap->category_id = $cat->category_id;
                    $PlanCategoryMap->category_limit_name = $request['category_'.$cat->category_id];
                    $PlanCategoryMap->save(); 
                }
            }
            return back()->with('message','Plan and their categories values are Updated successfully');
        }else{
            return back()->with('error','Plan Doesnot Exists with our Records');
        }
        
        
        
    }
    public function editPlan($plan_id)
    {
          $Plan = Plan::where('plan_id',$plan_id)->first();
          if($Plan){
              $clients = Client::latest('client_id')->get();
              $categories = Category::all();
              $PlanCategoryMaps = PlanCategoryMap::where('plan_id',$plan_id)->get();
              $mapping_values = [];
              foreach($PlanCategoryMaps as $values){
                  $mapping_values[$values->category_id] = $values->category_limit_name;
              }
              return view('admin.pages.canopy.edit-plan',get_defined_vars()); 
          }else{
              return back()->with('error','Plan Doesnot Exists with our Records');
          }
         
    }
    
     public function newPlan(){
          $clients = Client::latest('client_id')->get();
          $categories = Category::all();
          return view('admin.pages.canopy.add-plan',get_defined_vars());  
    }
    public function searchPlans(Request $request)
    {
        $searchTerm = $request->searchTerm;
        
        $plans = Plan::where('plan_name', 'like', '%' . $searchTerm . '%')->latest('plan_id')->paginate(25);
    
        $viewTable = view('admin.pages.canopy.partials.plan_table', compact('plans'))->render();
        $viewPagination = $plans->links()->render();
    
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);
    }
    
    
   
    
    
}
