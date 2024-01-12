<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\PlanCategoryMap;
use App\Models\MainUser;
use DB;
use Validator;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;
use DataTables;
use DateTime;

use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('client_id_search'))
        {
            $clients = Client::where('client_name', 'like', '%' . $request->client_id_search . '%')
        // ->orwhere('client_name', 'like', '%' . $request->client_id_search . '%')
            ->paginate(25);
        }elseif($request->has('client_id_edit'))
        {
            $update = Client::where('client_id', $request->client_id_edit)->update([
                'client_name' => $request->client_name_edit]);
                $clients = Client::latest('client_id')->paginate(25);
                return back()->with('success','Client ID Updated Successfully');
        }
        else
        $clients = Client::latest('client_id')->paginate(25);
        
        return view('admin.pages.canopy.client_mst',get_defined_vars());
    }
    public function addClient(Request $request){
       $request->validate([
            'client_id'=> 'required|unique:client_mst,client_name|regex:/^[a-zA-Z0-9]+$/'
        ]);
        $Client = new Client;
        $Client->client_name = $request->client_id;
        $Client->save();
        return back()->with('success','New client Group has been added successfully');
    }
    
    public function searchClient(Request $request)
    {
        $request->validate([
            'client_id_search'=> 'required|regex:/^[a-zA-Z0-9]+$/'
        ],[
            'client_id_search.required' => 'Client ID/Name is required'
            ]);
        $clients = Client::where('client_name', 'like', '%' . $request->client_id_search . '%')
        // ->orwhere('client_name', 'like', '%' . $request->client_id_search . '%')
            ->paginate(25);
        return view('admin.pages.canopy.client_mst',get_defined_vars());
    }
    
   
    
    
}
