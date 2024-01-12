<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //  UPDATE `users` SET `qr_link`=  concat('http://canopy.zoomqr.com/qr/',`uuid`)  where qr_link is null
    //  UPDATE `users` SET `uuid`= uuid() where uuid is null
    public function index()
    {
        dd(url('/'));
        // $user = DB::table('users')->get();
        // dd($user);
        // return view('home');
        
        // client_ids insertions
        
        // $main = DB::table('canopy_main')->where('CLIENT_ID','!=','74612374')->distinct()->pluck('CLIENT_ID');
        // dd($main);
        // foreach($main as $db){
        //     DB::table('client_mst')->insert([
        //         'client_name' => $db,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        
        //plan_mst insertion
        
        // $main = DB::table('canopy_main')->select('LOC_ID','CLIENT_ID')->get();
        // //  dd($main);
        //   foreach($main as $plan){
        //     $client =  DB::table('client_mst')->where('client_name',$plan->CLIENT_ID)->first();
        //     if($client){
        //           DB::table('plan_mst')->insert([
        //                 'client_id' => $client->client_id,
        //                 'plan_name' => $plan->LOC_ID,
        //             ]);
        //     }
           
        //   }
        
        // plan_category_insertion
        
        
    //  $records = DB::table('canopy_main')->where('id', '>', 100)->get();

    //   foreach($records as $rec){
    //       $plan = DB::table('plan_mst')->where('plan_name',$rec->LOC_ID)->first();
    //       if($plan){
    //           $categories = DB::table('categories_mst')->get();
    //           foreach($categories as $cat){
    //               $limit = trim($cat->category_name);
    //             //   echo($rec->$limit)  ;
    //                 DB::table('plan_category_map')->insert([
    //                         'plan_id' => $plan->plan_id,
    //                         'category_id' => $cat->category_id,
    //                         'category_limit_name'=> $rec->$limit,
    //                  ]);
    //           }
    //       }
    //   }
    
    
    
    // new enrolls 
    // dd('test');
    //  $enrolls =    DB::table('new_enrolls')
    //   ->whereNotExists(function ($query) {
    //       $query->select(DB::raw(1))
    //              ->from('users')
    //              ->whereRaw('users.card_no = new_enrolls.CARD_NUMBER');
    //   });
     
    // foreach($enrolls as $enroll){
    //     $plan = DB::table('plan_mst')->where('plan_name',$enroll->PLAN)->first();
    //     // dd($plan);
    //   if($plan){
    //       DB::table('users')->insert([
    //                     'plan_id' => $plan->plan_id,
    //                     'card_no' => $enroll->CARD_NUMBER,
    //                     'effective_date'=> $enroll->EFF,
    //                     'terminatiion_date'=> $enroll->TERM,
    //                     'dob'=> $enroll->DOB,
    //                     'comment'=> $enroll->COMMENT,
    //                 ]);
    //   }
    // }
    // dd('exit');
    
    
    //add enroll details here
    
    
                
           
                
    //     $enrolls =   DB::table('new_enrolls')
    //             ->whereExists(function ($query) {
    //                 $query->select(DB::raw(1))
    //                     ->from('users')
    //                     ->whereRaw('users.card_no = new_enrolls.CARD_NUMBER');
    //             })->get();
                
                
    //     foreach($enrolls as $enroll){
    //         echo $enroll->CARD_NUMBER.'<br>';
            
    //         $update = DB::table('users')->where('card_no',$enroll->CARD_NUMBER)
    //         ->update(['comment' => $enroll->COMMENT]);
    //     }
    
    
    // exit;
            //   dd($enrolls);
            
    // $enrolls =   DB::table('new_enrolls')->where('id',1)->get();  
    
    // $enrolls_distinct =   DB::table('new_enrolls')->distinct()->count(); 
            
         
        //  dd ($enrolls_distinct);
        //  $enrolls_distinct =    DB::table('new_enrolls')->select('CARD_NUMBER')
        //     ->distinct()
        //     ->get();
            
        //     dd($enrolls_distinct);
            
            
    //     $repeatedCards = DB::table('new_enrolls')
    // ->select('CARD_NUMBER', DB::raw('count(*) as count'))
    // ->groupBy('CARD_NUMBER')
    // ->having('count', '>', 1)
    // ->get();
    
    //     dd (count($repeatedCards));
         $enrolls =   DB::table('new_enrolls')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('users')
                        ->whereRaw('users.card_no = new_enrolls.CARD_NUMBER');
                })->get();
                // dd ($enrolls);
                //  $RR = [];
                // foreach($enrolls as $enroll){
                //   $plan = DB::table('plan_mst')->where('plan_name',$enroll->PLAN)->first();
                //   if(empty($plan)){
                //       array_push($RR,$enroll->PLAN);
                //   }
                // }
                // dd($RR);
                
                
        $users = DB::table('users')->where('qr_path',NULL)->get();
        //   dd($users);
        $i=0;
                // foreach($enrolls as $enroll){
                foreach($users as $enroll){
        // $plan = DB::table('plan_mst')->where('plan_name',$enroll->PLAN)->first();
        
        $user =  DB::table('users')->where('card_no',$enroll->card_no)->first();
        
        // dd($user);
      if($user){
          $uuidString = $user->uuid;
        //   $uuid = Str::uuid();
        // $uuidString = $uuid->toString();
        
        // $qr_link = "http://canopy.zoomqr.com/qr/".$uuidString;
         
        //   DB::table('users')->insert([
        //                 'uuid' => $uuidString,
        //                 'plan_id' => $plan->plan_id,
        //                 'card_no' => $enroll->CARD_NUMBER,
        //                 'effective_date'=> $enroll->EFF,
        //                 'terminatiion_date'=> $enroll->TERM,
        //                 'dob'=> $enroll->DOB,
        //                 'comment'=> $enroll->COMMENT,
        //                 'qr_link'=>$qr_link
        //             ]);
                    
        
        $url = "https://canopy.zoomqr.com/newqrcode/generateQrCode.php?uuid=".$uuidString;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, false);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $smsres = curl_exec($ch);
            // dd($smsres);
            curl_close($ch);
                    
             $i++;       
                    
      }
    }
    
    
   
   
    
      dd('completed == '.$i)  ;
        
        
    }
    
    
    public function qrGenerate($u_id){
        // dd('test');
    //   dd($u_id);
        $user = DB::table('users')->join('plan_mst', 'users.plan_id', '=', 'plan_mst.plan_id')->where('users.uuid',$u_id)->first();
        
        
        if($user){
           $plans = DB::table('plan_category_map')->join('categories_mst', 'categories_mst.category_id', '=', 'plan_category_map.category_id')->where('plan_category_map.plan_id',$user->plan_id)->get();
        //   dd($plans) ;
           foreach($plans as $key=>$value){
              $categories[$value->category_id] = $value->category_limit_name; 
           }
           return view('welcome',compact('user','plans','categories'));
        
        }else{
            dd('Invalid Id');
        }
        
    }
    public function allQrCodes(){
         $users = DB::table('users')->orderBy('id',"DESC")->get();
        // dd($users);
         return view('all-qr',compact('users'));
    }
    
    public function newBlade(){
        return view('new_blade');
    }
}
