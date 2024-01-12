<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\birthCertificate;
use App\Models\Proposal;
use App\Models\Files;
use Session;
use SimpleXMLElement;
use DB;
error_reporting(0);

class BirthController extends Controller
{
    
    
    public function enquiryForms(){
        $birthCertificates= birthCertificate::latest()->get();  
        //$birthCertificate = birthCertificate::with('FilesInfo')->get();
        foreach($birthCertificates as $birthCertificate){
            $birthCertificate->files_info=Files::select('image_name')->where('enq_id',$birthCertificate->id)->get();
        }
        return response($birthCertificates, 200);
    }
    public function enquiryFormsGet(Request $request){
       //echo  $id = $request->id; exit();
        $id =  $request->id;    
        $birthCertificates= birthCertificate::where('id',$id)->get();
        //$birthCertificate = birthCertificate::with('FilesInfo')->get();
        foreach($birthCertificates as $birthCertificate){
            $birthCertificate->files_info=Files::select('image_name')->where('enq_id',$birthCertificate->id)->get();
        }
        $data = DB::table('enquiry_form')
    	->select('*')
        ->join('proposal_mst','enquiry_form.type_of_proposal','=','proposal_mst.id')
        ->Where('enquiry_form.id',$id)
        ->get()->toArray();
        //print_r($data);
        return response($data, 200);  
    }
  

    public function index()
    {
            $Proposal = Proposal::all()->sortBy('sort_by');;
            //dd($Proposal);
            return view('enquiry', compact('Proposal'));
       
    }

    public function store(Request $request)
    {
      //dd($request->all());
        $request->validate([
            'org_name' => 'required',
           
            'org_number' => 'required',
            'org_email' => 'required',
            'org_info' => 'required',
            'cont_name' => 'required',
            'cont_number' => 'required',
            'cont_email' => 'required',
           
            'optradio' => 'required',
         
            
        ]);

       
        date_default_timezone_set('Asia/Calcutta');
        $insert_array = array(
            'org_name' => $request->org_name,
            'org_email' => $request->org_email,
            'org_mobile' => $request->org_number,
            'org_info' => $request->org_info,
            'org_address' => $request->org_address,
            'cont_name' => $request->cont_name,
            'cont_info' => $request->cont_info,
            'cont_mobile' => $request->cont_number,
            'cont_email' => $request->cont_email,
            'type_of_proposal' => $request->optradio,
            'description' => $request->description,
            'updated_at' =>  date('Y-m-d H:i:s'),
            'created_at' =>  date('Y-m-d H:i:s'),
        );
       $insert_status =  birthCertificate::create($insert_array);
    $data['enq_id'] = $insert_status->id; 
    $data['created_at'] =  date('Y-m-d H:i:s'); 
    $data['updated_at'] =  date('Y-m-d H:i:s'); 
     //dd($request->files[0]);

    foreach ($request->files as $key ) {
        foreach ($key as $file ) {
          
            $filename= date('YmdHi').$file->getClientOriginalName();
            $public_path = public_path('enquiry/');
            $file->move($public_path, $filename);
            $data['image_name']= $filename;
            $insert_status_files =  Files::create($data);
        }
    }
//exit;
    
       if($insert_status){
//dd($insert_status);
         ///////////////to user
            $sms ="Dear ".substr($insert_status->org_name,0,28).", thank you for showing interest in contributing to the development of the city. Our officers will reach out to you shortly. Regards, Citizen Engagement Cell, AMCGOV";
            $mobile= $insert_status->org_mobile;
            $templateId = "1707166710448813666";
            $message =str_replace ( ' ', '%20', $sms);
            $url ="http://smsatm.net/v3/api.php?username=ASCDCL&apikey=c01f32640f54e44f7660&senderid=AMCGOV&templateid=".$templateId."&mobile=".$mobile."&message=".$message;
            //require_once('aurangabad_sms_config.php');
            $post = curl_init();
            curl_setopt($post,CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($post, CURLOPT_URL, $url);
            curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
            $result=curl_exec($post);
            //curl_close($post);
             // echo $sms; exit();


            /////////////to admin
            $sms ="We have received an inquiry regarding contribution to the development of the city from ".substr($insert_status->org_name,0,28).".Kindly contact them ".$insert_status->org_mobile." Regards, Citizen Engagement Cell, AMCGOV";
            //echo $sms; exit();
            $mobile= "8668505417";
            //$mobile= "7799348370";
            $templateId = "1707166710457996046";
            $message =str_replace ( ' ', '%20', $sms);
            $url ="http://smsatm.net/v3/api.php?username=ASCDCL&apikey=c01f32640f54e44f7660&senderid=AMCGOV&templateid=".$templateId."&mobile=".$mobile."&message=".$message;
            //require_once('aurangabad_sms_config.php');
            $post = curl_init();
            curl_setopt($post,CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($post, CURLOPT_URL, $url);
            curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
            $result=curl_exec($post);
      
            return Redirect::route('enquiry')->with('success', 'Form Submitted successfully.');
        }else{
            return Redirect::route('enquiry')->with('error', 'Something Went Wrong!');
            
       }
    }
   
    
}
