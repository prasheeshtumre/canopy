<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('admin.pages.dashboard');
    }
    public function index_login()
    {   
        return view('auth.login-2');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    
    // get properties count on type basis 
    public function propertyCount(Request $request){
         if($request->type == 'all'){
             $data['count'] = Property::count();
             $data['type'] = 'TOTAL SURVEYED';
             $data['key'] = 'all';
             return $data;
         }elseif($request->type == 'month'){
            $data['count'] = Property::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count(); 
             $data['type'] = 'SURVEYED THIS MONTH';
             $data['key'] = 'month';
             return $data;
         }elseif($request->type == 'week'){
             $data['count'] = Property::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
              $data['type'] = 'SURVEYED THIS WEEK';
              $data['key'] = 'week';
             return $data;
         }elseif($request->type == 'today'){
             $data['count'] = Property::whereDate('created_at', Carbon::today())->count();
              $data['type'] = 'SURVEYED TODAY';
              $data['key'] = 'today';
             return $data;
         }
    }
}
