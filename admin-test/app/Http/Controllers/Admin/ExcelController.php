<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\Client;
use App\Models\MainUser;
use App\Models\Plan;
use App\Models\QrCodeGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Jobs\RunInBackgroundJob;
use Session;

error_reporting(0);

class ExcelController extends Controller
{
    public function uploadsss(Request $request)
    {

        $request->validate([
            'file' => 'required|file|mimes:csv,txt',
        ]);

        $files = $request->file('file')->store('excel/temp');

        $file = fopen(storage_path('app/' . $files), "r");
        fgetcsv($file);
        $key2 = 2;
        // Parse CSV file and insert data into the database
        $plan_names = [];
        $card_numbers = [];
        $error_status  = true;
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            $card_noq = $data[0];

            if ($card_noq != '') {

                $card_no = $data[0];
                $plan_id = $data[2];

                $plan =  DB::table('plan_mst')->where('plan_name', '=', $plan_id)->first();
                if (empty($plan)) {
                    array_push($plan_names, ' Plan ID - ' . $plan_id . '  Not Found at row ' . $key2);
                    $error_status = false;
                } else {
                    $users = DB::table('users')->where('card_no', trim($card_no))->first();
                    if ($users) {
                        array_push($plan_names, ' Duplicate Card Number - ' . $card_no . ' at row ' . $key2);
                        $error_status = false;
                    }
                }
            }

            $key2++;
        }

        // dd($plan_names);

        if ($error_status == false) {
            $plan_names = $plan_names;
            $clients = Client::all();
            $plans = Plan::all();
            $qr_codes = MainUser::orderBy('id', 'DESC');

            return redirect()->back()->withErrors($plan_names)
                ->withInput();
            // return view('admin.pages.canopy.generate_qr_code', get_defined_vars());
        } else {

            $file = fopen(storage_path('app/' . $files), "r");
            fgetcsv($file);

            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                //  dd('ds',$file);
                $card_number = $data[0];
                // dd($card_number);
                if ($card_number != '') {
                    $card_no = $data[0];
                    $dob = $data[1];
                    $plan_id = $data[2];
                    $effective_date = $data[3];
                    $terminatiion_date = $data[4];

                    $plan =  DB::table('plan_mst')->where('plan_name', '=', $plan_id)->first();


                    $uuid = Str::uuid();
                    $uuidString = $uuid->toString();

                    $qr_link = "http://canopy.zoomqr.com/qr/" . $uuidString;
                    // $qr_link = "http://canopy.zoomqr.com/admin/admin/qr/" . $uuidString;

                    $users =   DB::table('users')->insert([
                        'uuid' => $uuidString,
                        'plan_id' => $plan->plan_id,
                        'card_no' => $card_no,
                        'qr_link' => $qr_link,
                        'dob' => date('d-M-y', strtotime($dob)),
                        'effective_date' => date('d-M-y', strtotime($effective_date)),
                        'terminatiion_date' => date('Ymd', strtotime($terminatiion_date))
                    ]);
                    $qr_code = new QrCodeGenerator;
                    $qr_code->client_id = $plan->client_id;
                    $qr_code->uuid = $uuidString;
                    $qr_code->plan_id = $plan->plan_id;
                    $qr_code->card_number = $card_no;
                    $qr_code->dob = date('Y-m-d', strtotime($dob));
                    $qr_code->effective_date = date('Y-m-d', strtotime($effective_date));
                    $qr_code->termination_date = date('Y-m-d', strtotime($terminatiion_date));
                    $qr_code->save();



                    $url = "https://canopy.zoomqr.com/newqrcode/generate_qr_code_live.php?uuid=" . $uuidString;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_POST, false);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $smsres = curl_exec($ch);
                    // dd($smsres);
                    curl_close($ch);
                    // return response()->json(['msg' => 'Qr Code generated Successfully...!'], 201);

                    sleep(5);
                }
            }
            // $clients = Client::all();
            // $plans = Plan::all();
            // $qr_codes = MainUser::orderBy('id','DESC');
            // return view('admin.pages.canopy.generate_qr_code', get_defined_vars());
            // return response()->json(['msg' => 'Qr Code generated Successfully...!'], 201);
            return redirect()->back()->with('message', 'Data imported successfully!');
        }


        // Close CSV file and database connection
        fclose($file);

        // dd($result);

    }

    public function uploadQr(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt',
        ]);

        $files = $request->file('file')->store('excel/temp');

        $file = fopen(storage_path('app/' . $files), "r");
        fgetcsv($file);
        $key2 = 2;
        // Parse CSV file and insert data into the database
        $plan_names = [];
        $card_numbers = [];
        $error_status  = true;
        while (($data = fgetcsv($file, 0, ",")) !== FALSE) {
            $card_noq = $data[0];
            // dd($card_noq);

            if ($card_noq != '') {

                $card_no = $data[0];
                $plan_id = $data[2];

                $plan =  DB::table('plan_mst')->where('plan_name', '=', $plan_id)->first();
                if (empty($plan)) {
                    array_push($plan_names, ' Plan ID - ' . $plan_id . '  Not Found at row ' . $key2);
                    $error_status = false;
                } else {
                    $users = DB::table('users')->where('card_no', trim($card_no))->first();
                    if ($users) {
                        array_push($plan_names, ' Duplicate Card Number - ' . $card_no . ' at row ' . $key2);
                        $error_status = false;
                    }
                }
            }

            $key2++;
        }


        if ($error_status == false) {
            return redirect()->back()->withErrors($plan_names)->withInput();
        } else {
            $response  = RunInBackgroundJob::dispatch($files);
            $plan_names = Session::get('que_errors');
            return redirect()->back()->with('message', 'Data imported successfully!' . $plan_names);
        }

        // Close CSV file and database connection
        fclose($file);
    }

    public function updateQrBlade()
    {
        $clients = Client::all();
        $plans = Plan::all();
        $users = MainUser::where('status', 0)->get();
        return view('admin.pages.canopy.update_qr_code', get_defined_vars());
    }

    public function updateQrCodes(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt',
        ]);

        $files = $request->file('file')->store('excel/update/temp');

        $file = fopen(storage_path('app/' . $files), "r");
        fgetcsv($file);
        $key2 = 2;
        // Parse CSV file and insert data into the database
        $plan_names = [];
        $card_numbers = [];
        $error_status  = true;
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            $card_noq = $data[0];

            if ($card_noq != '') {

                $card_no = $data[0];
                $plan_id = $data[2];

                $plan =  DB::table('plan_mst')->where('plan_name', '=', $plan_id)->first();
                if (empty($plan)) {
                    array_push($plan_names, ' Plan ID - ' . $plan_id . '  Not Found at row ' . $key2);
                    $error_status = false;
                } else {
                    $users = DB::table('users')->where('card_no', '!=', trim($card_no))->first();
                    if ($users) {
                        array_push($plan_names, ' Card Number - ' . $card_no . ' Not Found at row ' . $key2);
                        $error_status = false;
                    }
                }
            }

            $key2++;
        }

        // dd($plan_names);

        if ($error_status == false) {
            $plan_names = $plan_names;
            $clients = Client::all();
            $plans = Plan::all();
            $qr_codes = MainUser::orderBy('id', 'DESC');

            return redirect()->back()->withErrors($plan_names)
                ->withInput();
            // return view('admin.pages.canopy.generate_qr_code', get_defined_vars());
        } else {

            $file = fopen(storage_path('app/' . $files), "r");
            fgetcsv($file);

            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                //  dd('ds',$file);
                $card_number = $data[0];
                // dd($card_number);
                if ($card_number != '') {
                    $card_no = $data[0];
                    $dob = $data[1];
                    $plan_id = $data[2];
                    $effective_date = $data[3];
                    $terminatiion_date = $data[4];
                    $comment = $data[5];

                    $plan =  DB::table('plan_mst')->where('plan_name', '=', $plan_id)->first();

                    $users = DB::table('users')->where('card_no', trim($card_no))->first();
                    if ($users) {
                        $users_update =   DB::table('users')->where('card_no', trim($card_no))->update([
                            'plan_id' => $plan->plan_id,
                            // 'dob' => date('d-M-y', strtotime($dob)),
                            // 'effective_date' => date('d-M-y', strtotime($effective_date)),
                            // 'terminatiion_date' => date('Ymd', strtotime($terminatiion_date))

                            'dob' => $dob,
                            'effective_date' => $effective_date,
                            'terminatiion_date' => $terminatiion_date,
                            'comment' => $comment
                        ]);
                    }


                    // return response()->json(['msg' => 'Qr Code generated Successfully...!'], 201);

                    // sleep(5);
                }
            }
            return redirect()->back()->with('message', 'Data Updated successfully!');
        }


        // Close CSV file and database connection
        fclose($file);

        // dd($result);

    }
}
