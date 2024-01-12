<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospitals;
use App\Models\Wards;
use App\Models\usage;
use App\Models\TransferType;
use App\Models\ZonalOffice;
use Session;
use SimpleXMLElement;

class OwnershipPropertyController extends Controller
{
    public function index()
    {
        if(Session::get('username')){
        
            $usage = usage::all();
            $TransferType = TransferType::all();
            $ZonalOffice = ZonalOffice::all();
            return view('ownership_property', compact('usage','TransferType','ZonalOffice'));
        }else{
            return redirect('/');
        }
    }
    public function store(Request $request)
    {
       dd($request->all());
       
        $request->validate([
            'app_name' => 'required',
            'app_address' => 'required',
            'app_mobile' => 'required',
            'transfer_type' => 'required',
            'prop_number' => 'required',
            'usage' => 'required',
            'tap_account_number' => 'required',
            'pre_own_name' => 'required',
            'prop_address' => 'required',
            'zonal_office' => 'required',
            'prop_holder_name' => 'required',
            'prop_holder_address' => 'required',
            'prop_holder_mobile' => 'required',
            'prop_holder_email' => 'required',
            'prop_boundries' => 'required',
            'prop_east' => 'required',
            'prop_west' => 'required',
            'prop_north' => 'required',
            'prop_south' => 'required',
            'aadhar_file' => 'required',
            'cidio_file' => 'required',
            'trans_type_file' => 'required',
            'tax_file' => 'required',
            'affidative_file' => 'required',
            'death_file' => 'required',
        ]);

        if($request->file('aadhar_file')){
            $file= $request->file('aadhar_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('birth_certificate/hospital_certificate/'), $filename);
            
            $aadhar_file= $filename;
        }
        if($request->file('cidio_file')){
            $file= $request->file('cidio_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('birth_certificate/aadhaar/'), $filename);
            $cidio_file= $filename;
        }
        if($request->file('trans_type_file')){
            $file= $request->file('trans_type_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('birth_certificate/aadhaar/'), $filename);
            $trans_type_file= $filename;
        }
        if($request->file('tax_file')){
            $file= $request->file('tax_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('birth_certificate/aadhaar/'), $filename);
            $tax_file= $filename;
        }
        if($request->file('affidative_file')){
            $file= $request->file('affidative_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('birth_certificate/aadhaar/'), $filename);
            $affidative_file= $filename;
        }
        if($request->file('death_file')){
            $file= $request->file('death_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('birth_certificate/aadhaar/'), $filename);
            $death_file= $filename;
        }
        date_default_timezone_set('Asia/Calcutta');
        $insert_array = array(
            'app_name' => $request->app_name,
            'app_address' => $request->app_address,
            'mobile' => $request->app_number,
            'app_email' => $request->app_email,
            'app_dob' => $request->app_dob,
            'gender' => $request->gender,
            'child_name' => $request->child_name,
            'fath_name' => $request->fath_name,
            'grand_fath_name' => $request->grand_fath_name,
            'moth_name' => $request->moth_name,
            'pob' => $request->pob,
            'hospital_id' => $request->hospital_name,
            'perm_address' => $request->perm_address,
            'ward_no' => $request->ward_no,
            'hosp_file' => $hosp_file,
            'aadh_file_moth' =>  $aadh_file_moth,
            'aadh_file_fath' =>  $aadh_file_fath,
            'created_at' =>  date('Y-m-d H:i:s'),
        );
       $insert_status =  birthCertificate::create($insert_array);
    //dd( $insert_status);
       if($insert_status){
          
        // $web_services = $this->curl_web($insert_status);
        //  $this->send_sms($insert_status,$web_services);
        //  $this->send_email($insert_status,$web_services);
        
            return Redirect::route('home')->with('success', 'Form Submitted successfully.');
        }else{
            return Redirect::route('home')->with('error', 'Something Went Wrong!');
            
       }
    }
}
