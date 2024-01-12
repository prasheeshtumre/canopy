<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\birthCertificate;
use App\Models\Hospitals;
use App\Models\Wards;
use Session;
use SimpleXMLElement;
error_reporting(0);

class BirthController extends Controller
{
  

    public function index()
    {
        if(Session::get('username')){
            $hospitals = Hospitals::all();
            $wards = Wards::all();
            return view('birth_certificate', compact('hospitals','wards'));
        }else{
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
       //dd($request->all());
        $request->validate([
            'app_name' => 'required',
            'app_address' => 'required',
            'app_number' => 'required',
            'app_email' => 'required',
            'app_dob' => 'required',
            'gender' => 'required',
            'child_name' => 'required',
            'fath_name' => 'required',
            'grand_fath_name' => 'required',
            'moth_name' => 'required',
            'pob' => 'required',
            'hospital_name' => 'required',
            'perm_address' => 'required',
            'ward_no' => 'required',
            'hosp_file' => 'required',
            'aadh_file_moth' => 'required',
            'aadh_file_fath' => 'required',
        ]);

        if($request->file('hosp_file')){
            $file= $request->file('hosp_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $public_path = public_path('birth_certificate/hospital_certificate/');
            $file->move($public_path, $filename);
            $hosp_file= $public_path.$filename;
        }
        if($request->file('aadh_file_fath')){
            $file= $request->file('aadh_file_fath');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $public_path =public_path('birth_certificate/aadhaar/');
            $file->move($public_path, $filename);
            $aadh_file_fath= $public_path.$filename;
        }
        if($request->file('aadh_file_moth')){
            $file= $request->file('aadh_file_moth');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $public_path = public_path('birth_certificate/aadhaar/');
            $file->move($public_path, $filename);
            $aadh_file_moth= $public_path.$filename;
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
          
         $web_services = $this->curl_web($insert_status);
         $reg_id =  $web_services->result;  
         $this->send_sms($insert_status,$reg_id);
         $this->send_email($insert_status,$reg_id);
       // print_r($web_services); exit();
       
            return Redirect::route('home')->with('success', 'Form Submitted successfully.');
        }else{
            return Redirect::route('home')->with('error', 'Something Went Wrong!');
            
       }
    }
    public function logout()
    {						
        Session::flush();
        Session::forget('username');
        Session::forget('userid');
        return redirect('/');
    }
    
    
    public function curl_web($data){

        $xml = '<BirthRegistration>
        <registrationid>0</registrationid>
        <address>'.$data['app_address'].'</address>
        <name>'.$data['app_name'].'</name>
        <ph_no>'.$data['mobile'].'</ph_no>
        <email>'.$data['app_email'].'</email>
        <dob>'.$data['app_dob'].'</dob>
        <placeofbirth>'.$data['pob'].'</placeofbirth>
        <gender>'.$data['gender'].'</gender>
        <hospitalname>'.$data['hospital_id'].'</hospitalname>
        <childename>'.$data['child_name'].'</childename>
        <fathername>'.$data['fath_name'].'</fathername>
        <grandfathername>'.$data['grand_fath_name'].'</grandfathername>
        <permanentaddress>'.$data['perm_address'].'</permanentaddress>
        <birthplace>'.$data['pob'].'</birthplace>
        <nooffreecopyissued>0</nooffreecopyissued>
        <pdfsavedpath>0</pdfsavedpath>
        <mothername>'.$data['moth_name'].'</mothername>
        <status>0</status>
        <motherresidencetype>0</motherresidencetype>
      
        </BirthRegistration>';
        
        
        //The URL that you want to send your XML to.
        $url = 'http://175.101.6.10:8085/RTS/ws/birthRegistration/saveRegistrationApplication';
        
        //Initiate cURL
        $curl = curl_init($url);
        
        //Set the Content-Type to text/xml.
        curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/xml"));
        
        //Set CURLOPT_POST to true to send a POST request.
        curl_setopt($curl, CURLOPT_POST, true);
        
        //Attach the XML string to the body of our request.
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
        
        //Tell cURL that we want the response to be returned as
        //a string instead of being dumped to the output.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        //Execute the POST request and send our XML.
        $result = curl_exec($curl);
        $xml = new SimpleXMLElement($result);
       // echo "<pre>";
        
        //Do some basic error checking.
        if(curl_errno($curl)){
            throw new Exception(curl_error($curl));
        }
        
        //Close the cURL handle.
        curl_close($curl);
        
        //Print out the response output.
         
        return $xml;
        //return $result;  
    
    }
    public function send_sms($data,$reg_id){
                    $sms ="Dear ".$data['app_name']."  your Appl. No. ".$reg_id." for Birth Certificate is received on ".date("d-m-Y H:i:s",strtotime($data['created_at']))." Regards, AMCORP";
					$mobile= $data['mobile'];
				    $templateId = "1707166556299155014";
				    $message =str_replace ( ' ', '%20', $sms);
				    $url ="http://smsatm.net/v3/api.php?username=ASCDCL&apikey=c01f32640f54e44f7660&senderid=AMCGOV&templateid=".$templateId."&mobile=".$mobile."&message=".$message;
				    //require_once('aurangabad_sms_config.php');
				    $post = curl_init();
                    curl_setopt($post,CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($post, CURLOPT_URL, $url);
                    curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
                    $result=curl_exec($post);
    }
   public function send_email($data,$reg_id){
          $message_data = "Dear <b>".ucfirst($data['app_name'])."</b>, <br>";
          $message_data .="<br>";
          $message_data .="Thank you for your interest in the RTS online services module by Aurangabad Mahanagarpalika.<br>";
          $message_data .="Your <b>Application No. ".$reg_id."</b> for <b>Birth Certificate</b> has been successfully submitted.<br>";
          $message_data .="You can use the application number to track the status of the application.<br>";
          $message_data .="<br>";
          $message_data .="Regards,<br>";
          $message_data .="Aurangabad Mahanagarpalika<br>";
          $message_data .="Helpline Number 155304";
        
                $curl = curl_init();
                $to_email = $data['app_email'];
                $name_email = $data['app_name'];
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.zeptomail.com/v1.1/email",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
               
                CURLOPT_POSTFIELDS => '{
                            "bounce_address":"madhu@bounce.egovindia.co.in",
                            "from": { "address": "noreply@egovindia.co.in","name": " Birth Certificate"},
                            "to": [{"email_address": {"address": "'.$to_email.'","name": "'.$name_email.'"}}],
                            "subject":"AMC RTS Services Birth Certificate",
                            "htmlbody":"'.$message_data.'",
                            }
                              ]
                            }',
                        CURLOPT_HTTPHEADER => array(
                        "accept: application/json",
                        "authorization: Zoho-enczapikey wSsVR60jrkT4D6p5n2eoJeg9mgkDAAjyEkt+i1Wm6XT7SvzF88c8kEybAFWhH6AcF2U9EDdAoegsnBpRgGBbi9x8mFxWCiiF9mqRe1U4J3x17qnvhDzPXWtflhqNKY4MwA5tnmlkEM5u",
                        "cache-control: no-cache",
                        "content-type: application/json",
                    ),
                ));
                
                $response = curl_exec($curl);
               //print_r($response);
                $err = curl_error($curl);
                $result = curl_close($curl);
              
   }
   public function get_application()
    {
        if(Session::get('username')){
            $hospitals = Hospitals::all();
            $wards = Wards::all();
            return view('get_application', compact('hospitals','wards'));
        }else{
            return redirect('/');
        }
    }
    public function getApplicationData(Request $request)
    {
        //dd($request->all());
        $xml = '<BirthRegistration>
        <rtiapplrefno>'.$request->app_id.'</rtiapplrefno>
        </BirthRegistration>';
        
        
        //The URL that you want to send your XML to.
        $url = 'http://175.101.6.10:8085/RTS/ws/birthRegistration/getRegistrationApplication';
        
        //Initiate cURL
        $curl = curl_init($url);
        
        //Set the Content-Type to text/xml.
        curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/xml"));
        
        //Set CURLOPT_POST to true to send a POST request.
        curl_setopt($curl, CURLOPT_POST, true);
        
        //Attach the XML string to the body of our request.
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
        
        //Tell cURL that we want the response to be returned as
        //a string instead of being dumped to the output.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        //Execute the POST request and send our XML.
        $result = curl_exec($curl);
        $application_data = new SimpleXMLElement($result);
        // echo "<pre>";
        // print_r($application_data); exit();
        //Do some basic error checking.
        if(curl_errno($curl)){
            throw new Exception(curl_error($curl));
        }
        
        //Close the cURL handle.
        curl_close($curl);
        
        //Print out the response output.
         
      
        
        return view('get_application', compact('application_data'));
        //return $result;  
    }
    
}
