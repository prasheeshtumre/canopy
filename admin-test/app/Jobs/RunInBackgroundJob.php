<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

use App\Imports\UsersImport;
use App\Models\Client;
use App\Models\MainUser;
use App\Models\Plan;
use App\Models\QrCodeGenerator;
use Illuminate\Support\Str;
use Session;

class RunInBackgroundJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $files;
    public function __construct($files)
    {
        $this->files = $files;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        
        $files = $this->files;
        
            // Define the chunk size (number of rows per chunk)
            $chunk_size = 50;
            // Open the CSV file for reading
            $handle = fopen(storage_path('app/' . $files), "r");
            
            // Skip the header row
            fgetcsv($handle);
            
            // Read the data from the CSV file in chunks
            $chunks = [];
            while (!feof($handle)) {
                $chunk = [];
                for ($i = 0; $i < $chunk_size && !feof($handle); $i++) {
                    $row = fgetcsv($handle);
                    if ($row) {
                        $chunk[] = $row;
                    }
                }
                if (!empty($chunk)) {
                    $chunks[] = $chunk;
                }
            }
            // Close the CSV file
            fclose($handle);
            
            DB::table('new_enrolls')->truncate();
            foreach ($chunks as  $array_values) {
                    foreach ($array_values as $key => $chunk) {
                    $card_number = $chunk[0];
                    $dob = $chunk[1];
                    $plan_id = $chunk[2];
                    $effective_date = $chunk[3];
                    $terminatiion_date = $chunk[4];
                    $comment = $chunk[5];
                    
                    DB::table('new_enrolls')->insert([
                        'CARD_NUMBER' => $card_number,
                        'DOB' => $dob,
                        'EFF' => $effective_date,
                        'TERM' => $terminatiion_date,
                        'PLAN' => $plan_id,
                        'COMMENT' =>$comment
                    ]);
                }
                
            }
            
            // Get the list of distinct values
            $enrolls_distinct = DB::table('new_enrolls')->select('CARD_NUMBER', DB::raw('MAX(id) as id'))->groupBy('CARD_NUMBER')->orderBy('id')->get();
            // dd($enrolls_distinct);
            // Update the rows with the new status
            foreach ($enrolls_distinct as $row) {
                DB::table('new_enrolls')->where('id', $row->id)->update(['status' => '1']);
            }
            
            // $enrolls = DB::table('new_enrolls')->where('status',1)->get();
            
            //old records change status
            DB::table('users')->where('status', 1)->update(['status' => '2']);
            
            
            DB::table('new_enrolls')->where('status',1)->orderBy('id')->chunk($chunk_size, function ($records) {
                // $userData = $qr_code_generator = [];
                // loop through each chunk of records
                foreach ($records as $record) {
                    $plan =  DB::table('plan_mst')->where('plan_name', '=', $record->PLAN)->first();
                    if($plan){
                    // Generate uuid here
                    $uuid = Str::uuid();
                    $uuidString = $uuid->toString();
                    
                    //Create qr link 
                    // $qr_link = "http://canopy.zoomqr.com/qr/".$uuidString;
                    $qr_link = "http://canopy.zoomqr.com/admin-test/admin/qr/" . $uuidString;
                    
                    
                    
                    $users =   DB::table('users')->insert([
                        'uuid' => $uuidString,
                        'plan_id' => $plan->plan_id,
                        'card_no' => $record->CARD_NUMBER,
                        'qr_link' => $qr_link,
                        'dob' => $record->DOB,
                        'effective_date' => $record->EFF,
                        'terminatiion_date' => $record->TERM
                    ]);
                    
                    
                    $tst = DB::table('qr_code_generator')->insert([
                        'uuid' => $uuidString,
                        'plan_id' => $plan->plan_id,
                        'client_id'=> $plan->client_id,
                        'card_number' => $record->CARD_NUMBER,
                        // 'qr_link' => $qr_link,
                        'dob' => $record->DOB,
                        'effective_date' => $record->EFF,
                        'termination_date' => $record->TERM
                        ]);
                    // $qr_code = new QrCodeGenerator;
                    // $qr_code->client_id = $plan->client_id;
                    // $qr_code->uuid = $uuidString;
                    // $qr_code->plan_id = $plan->plan_id;
                    // $qr_code->card_number = $record->CARD_NUMBER;
                    // $qr_code->dob = $record->DOB;
                    // $qr_code->effective_date = $record->EFF;
                    // $qr_code->termination_date = $record->TERM;
                    // $qr_code->save();
                    
                    
                    //qr generator api
                    
                    // $url = "https://canopy.zoomqr.com/newqrcode/generate_qr_code.php?uuid=". $uuidString;
                    // $ch = curl_init();
                    // curl_setopt($ch, CURLOPT_POST, false);
                    // curl_setopt($ch, CURLOPT_URL, $url);
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    // $smsres = curl_exec($ch);
                    // // dd($smsres);
                    // curl_close($ch);
                    
                    
                    // // on the data here
                    $userData = [
                        'uuid' => $uuidString,
                        'plan_id' => $plan->plan_id,
                        'card_no' => $record->CARD_NUMBER,
                        'qr_link' => $qr_link,
                        'dob' => $record->DOB,
                        'effective_date' => $record->EFF,
                        'terminatiion_date' => $record->TERM
                    ];
                    
                    $qr_code_generator = [
                        'uuid' => $uuidString,
                        'plan_id' => $plan->plan_id,
                        'client_id'=> $plan->client_id,
                        'card_number' => $record->CARD_NUMBER,
                        // 'qr_link' => $qr_link,
                        'dob' => $record->DOB,
                        'effective_date' => $record->EFF,
                        'termination_date' => $record->TERM
                    ];
                }
                // insert the chunk of data into the destination table
                // dd($userData);
                // DB::table('users')->insert($userData);
                // DB::table('qr_code_generator')->insert($qr_code_generator);
                }
            });
            
            
            // DB::table('users')->where('status','0')->orderBy('id')->chunk(1, function ($records) {
            $records =  DB::table('users')->where('status','0')->orderBy('id')->get();
                // $userData = $qr_code_generator = [];
                // loop through each chunk of records
                foreach ($records as $record) {
                    // $url = "https://canopy.zoomqr.com/newqrcode/generate_qr_code_live.php?uuid=". $record->uuid;
                    $url = "https://canopy.zoomqr.com/newqrcode/generate_qr_code.php?uuid=". $record->uuid;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_POST, false);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $smsres = curl_exec($ch);
                    curl_reset($ch);
                    
                    curl_close($ch);
                    
                    sleep(5);
                }
                
            // });
            
            return Session::put('que_errors','success');
    }
    
     
}
