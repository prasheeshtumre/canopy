<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Property;
use App\Models\PropertyImage;
use Validator;
use Stevebauman\Location\Facades\Location;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $categories = Category::all();
        $sub_categories = SubCategory::all();

    

        // return $currentUserInfo = Location::get($ip);
        return view('admin.pages.property.index', compact('categories', 'sub_categories'));
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
        $input_data = $request->all();

        $validator = Validator::make(
            $input_data,
            [
                'files.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000',
                // 'city' => 'required',
                'gis_id' => 'required',
                 'latitude' => 'required',
                 'longitude' => 'required',
                'category' => 'required|numeric',
                'sub_category' => 'required|numeric',
                // 'house_no' => '',
                // 'plot_no' => '',
                'street_details' => 'required',
                'locality_name' => 'required',
                // 'owner_name' => '',
                // 'contact_no' => '',
                // 'remarks' => '',
            ],
            [
                'image_file.*.required' => 'Please upload an image',
                'image_file.*.mimes' => 'Only jpeg,png and bmp images are allowed',
                'image_file.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
                'category.numeric' => 'Please choose a category',
                'sub_category.numeric' => 'Please choose a Sub Category',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $property = new Property;
        // $property->city = $request->city;
        $property->gis_id = $request->gis_id;
        $property->cat_id = $request->category;
        $property->sub_cat_id = $request->sub_category;
        $property->house_no = $request->house_no;
        $property->plot_no = $request->plot_no;
        $property->street_details = $request->street_details;
        $property->locality_name = $request->locality_name;
        $property->owner_name = $request->owner_name;
        $property->contact_no = $request->contact_no;
        $property->remarks = $request->remarks;
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->save();

        if ($request->hasfile('files')) {

            foreach ($request->file('files') as $image) {
                $name = $image->getClientOriginalName();
                $file_name = uniqid() . "." . $image->getClientOriginalExtension();
                $image->move(public_path() . '/uploads/property/images', $file_name);
                $property_img = new PropertyImage;
                $property_img->file_url = $file_name;
                $property_img->property_id = $property->id;
                $property_img->save();
                //    $data[] = $name;  
            }
            // if (File::exists(public_path('uploads/csv/img.png'))) {
            //     File::delete(public_path('uploads/csv/img.png'));
            // }
        }


        return redirect()->back()->with('message', 'property added successfully');
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

    /**
     * get all the specified resource from storage.
     */
    public function reports(Request $request)
    {
        $properties = Property::all();
        return view('admin.pages.property.reports', compact('properties'));
    }

    /**
     * get all the specified resource from storage.
     */
    public function reportDetails(Request $request, $id)
    {
        $property = Property::find($request->id);
        $property->images;
        return view('admin.pages.property.report_details', compact('property'));
    }
}
