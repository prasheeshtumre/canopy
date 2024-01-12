<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Model\Login;
use App\Models\Login;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function checkLogin(Request $request)
		{
		 // dd($request->all());
		    
           $request->validate([
            'userName' => 'required',
            'password' => 'required',
    
        ]);		

            $username = htmlspecialchars(strip_tags($request->post('userName')));
            // $password = htmlspecialchars(strip_tags(sha1(md5($request->post('password')))));

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
}
