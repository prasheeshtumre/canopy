<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Model\Login;
use App\Models\Login;
use Session;
//use App\Http\Controllers\Redirect;
use Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function checkLogin(Request $request)
		{
		 // dd($request->all());
		    
           $request->validate([
            'userName' => 'required',
            'password' => 'required',
    
        ]);		

            $username = htmlspecialchars(strip_tags($request->post('userName')));
            $password = htmlspecialchars(strip_tags(sha1(md5($request->post('password')))));

             $userDet = Login::where('username', $username)->Where('password', $password)->first();
          

            if(!empty($userDet->id))
            {
            
                $request->session()->put('userid',$userDet->id);
                $request->session()->put('username',$userDet->username);
                return redirect('dashboard');
            }
            else
            {				
                Session::flash('wrong','Invalid Credentials');
                return redirect('/');
            }
          		
		}
        public function getOTPNumber(Request $request){
          
            $number = $request->mobile;
            $userRegisterCheck =  $this->userRegisterCheck($number);
           print_r($userRegisterCheck); 
            if($userRegisterCheck->status_code == "100"){
                Session::flash('wrong',$userRegisterCheck->message);
                    // return redirect('/register');
                    return view('register', compact('userRegisterCheck'));
            }elseif($userRegisterCheck->status_code == "102"){
                Session::flash('wrong',$userRegisterCheck->message);
                return view('register', compact('userRegisterCheck'));
            }elseif($userRegisterCheck->status_code == "200"){
                return view("verify-otp",compact('number') );
            }
            exit();
            
    
        }
        public function userRegisterCheck($number){
           
            $ulb= "250";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://www.aurangabadmahapalika.org/csms/api/login_otp.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
            "user_id=".$number."&ulbid=".$ulb." ");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);
            return  $result_array =  json_decode($server_output);
           
            curl_close ($ch);
        }
        public function RegisterUser(Request $request){
            // dd($request->all());  
             $request->validate([
                'full_name' => 'required',
                'mobile' => 'required',
                'email' => 'required',
        
            ]);		
            $number = $request->mobile;
          
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://www.aurangabadmahapalika.org/csms/api/register_user.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            if($request->login_status != ""){
            curl_setopt($ch, CURLOPT_POSTFIELDS,
            "user_id=".$request->mobile."&user_name=".$request->full_name."&user_email=".$request->email."&login_status=".$request->login_status."&id=".$request->id);
            }else{
            curl_setopt($ch, CURLOPT_POSTFIELDS,
            "user_id=".$request->mobile."&user_name=".$request->full_name."&user_email=".$request->email);
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);
            $result_array =  json_decode($server_output);
      

            if($result_array->status_code == "100"){
                Session::flash('wrong',$result_array->msg);
                return redirect('/');
            }elseif($result_array->status_code == "201"){
                print_r($result_array); exit();
            }elseif($result_array->status_code == "200"){
                return view("verify-otp",compact('number') );
            }
            print_r($result_array); exit();

            curl_close ($ch);

        }
        public function verifyOTP(Request $request){
           
             $request->validate([
                'mobile' => 'required',
                'otp' => 'required',
              
            ]);		
          
          
            $ulb= "250"; 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://www.aurangabadmahapalika.org/csms/api/verify_otp.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
            "user_id=".$request->mobile."&ulbid=".$ulb."&otp=".$request->otp."&emailotp=".$request->otp." ");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec($ch);
            $result_array =  json_decode($server_output);
         

            if($result_array->status_code == "200"){
                $request->session()->put('userid',$result_array->user_id);
                $request->session()->put('username',$result_array->username);
                return redirect('dashboard');
            }elseif($result_array->status_code == "100"){
                print_r($result_array); exit();
               //return redirect()->back(); 
            }
            print_r($result_array); exit();

            curl_close ($ch);
        }
}
