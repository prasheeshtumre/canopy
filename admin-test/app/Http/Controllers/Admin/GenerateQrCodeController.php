<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Plan;
use App\Models\QrCodeGenerator;
use App\Models\User;
use App\Models\MainUser;
use DB;
use Validator;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;
use DataTables;
use DateTime;
use ZipArchive;

use Illuminate\Support\Str;

error_reporting(0);

class GenerateQrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.pages.property.index');
    }
    public function GenerateQrCode(Request $request)
    {
        $clients = Client::all();
        $plans = Plan::all();
        $users = MainUser::where('status', 0)->get();

        // return view('admin.pages.canopy.test_qr', compact('clients', 'plans','users'));
        return view('admin.pages.canopy.generate_qr_code', compact('clients', 'plans', 'users'));
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = MainUser::query()
                ->select('users.*', 'plan_mst.plan_name')
                ->join('plan_mst', 'users.plan_id', '=', 'plan_mst.plan_id');

            if ($request->has('plan_name') && !empty($request->get('plan_name'))) {
                //  $users->where('card_no', 'like', '%' . $request->input('plan_id') . '%');
                $users->where('plan_mst.plan_name', 'like', '%' . $request->input('plan_name') . '%');
            }

            if ($request->has('search_date') && !empty($request->get('search_date'))) {
                $from = $request->get('search_date') . " 00:00:00";
                $to = $request->get('search_date') . " 23:59:59";
                $users->whereBetween('users.created_at', [$from, $to]);
            }


            $users = $users->orderBy('users.id', 'desc')->get();


            foreach ($users as $key => $val) {
                $users[$key]['plan_name'] = $val->plan->plan_name;
                $users[$key]['dob'] = date('d-m-Y', strtotime($val->dob));
                $users[$key]['effective_date'] = date('d-m-Y', strtotime($val->effective_date));
                $users[$key]['termination_date'] = date('d-m-Y', strtotime($val->terminatiion_date));
                $users[$key]['created_att'] = date('d-m-Y', strtotime($val->created_at));
            }




            return Datatables::of($users)
                ->addIndexColumn()
                // ->filter(function ($instance) use ($request) {

                // if (!empty($request->get('search'))) {
                //     $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                //         if (Str::contains(Str::lower($row['plan_name']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['cat']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['sub_cat']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['date']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['time']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['house_no']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['locality_name']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['street_name']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['owner_name']), Str::lower($request->get('search')))) {
                //             return true;
                //         } else if (Str::contains(Str::lower($row['contact_no']), Str::lower($request->get('search')))) {
                //             return true;
                // }
                //         return false;
                //     });
                // }
                // })
                ->addColumn('action', function ($row) {

                    $btn = '<a target="__blank" href="https://canopy.zoomqr.com/newqrcode/canopy_qr_code/' . $row->card_no . '.jpg">
                                <button class="btn btn-info btn-sm"><i class="fa fa-download"></i>Download QR</button>
                            </a>';

                    return $btn;
                })
                // ->offset(request('start'))
                // ->limit(request('length'))
                // ->skipPaging()
                // ->setTotalRecords`

                ->make(true);
        }
        // $users = MainUser::orderBy('id','DESC')->get();
        // return DataTables::of($users)->make(true);
    }


    public function getPlans(Request $request)
    {
        $plans = Plan::where('client_id', $request->c_id)->get();
        return response()->json($plans, 200);
    }

    public function qrGenerate($u_id)
    {
        //   dd($u_id);
        $user = DB::table('users')->join('plan_mst', 'users.plan_id', '=', 'plan_mst.plan_id')->where('users.uuid', $u_id)->first();
        if ($user) {
            $plans = DB::table('plan_category_map')->join('categories_mst', 'categories_mst.category_id', '=', 'plan_category_map.category_id')->where('plan_category_map.plan_id', $user->plan_id)->get();
            foreach ($plans as $key => $value) {
                $categories[$value->category_id] = $value->category_limit_name;
            }
            return view('welcome', compact('user', 'plans', 'categories'));
        } else {
            dd('Invalid Id');
        }
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

        $request->validate([
            'plan_id' => 'required',
            'card_number' => 'required|unique:users,card_no',
            'dob' => 'required',
            'effective_date' => 'required',
            'termination_date' => 'required'
        ]);


        // $users = DB::table('users')->where('card_no',$request->card_number)->first();

        // if($users){
        $uuid = Str::uuid();
        $uuidString = $uuid->toString();

        $qr_link = "http://canopy.zoomqr.com/qr/" . $uuidString;
        // $qr_link = "http://canopy.zoomqr.com/admin/admin/qr/" . $uuid;

        $users =   DB::table('users')->insert([
            'uuid' => $uuidString,
            'plan_id' => $request->plan_id,
            'card_no' => $request->card_number,
            'qr_link' => $qr_link,
            'status' => 2,
            'dob' => date('d/m/Y', strtotime($request->dob)),
            'effective_date' => date('d/m/Y', strtotime($request->effective_date)),
            'terminatiion_date' => date('d/m/Y', strtotime($request->termination_date))
        ]);

        $qr_code = new QrCodeGenerator;
        $qr_code->client_id = $request->client_id;
        $qr_code->uuid = $uuidString;
        $qr_code->plan_id = $request->plan_id;
        $qr_code->card_number = $request->card_number;
        $qr_code->dob = date('Y-m-d', strtotime($request->dob));
        $qr_code->effective_date = date('Y-m-d', strtotime($request->effective_date));
        $qr_code->termination_date = date('Y-m-d', strtotime($request->termination_date));
        $qr_code->save();


        $url = "https://canopy.zoomqr.com/newqrcode/generate_qr_code.php?uuid=" . $uuidString;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $smsres = curl_exec($ch);
        // dd($smsres);
        curl_close($ch);
        return response()->json(['msg' => 'Qr Code generated Successfully...!'], 201);
        // }else{
        //     return response()->json(['msg' => 'Card number Not found'], 200);
        // }
    }


    public function completed()
    {
        return view('admin.pages.property.completed');
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $perPage = 50;
        $users = MainUser::query()
            ->select('users.*', 'plan_mst.plan_name')
            ->join('plan_mst', 'users.plan_id', '=', 'plan_mst.plan_id');

        if ($request->has('plan_name') && !empty($request->get('plan_name'))) {
            $users->where('plan_mst.plan_name', 'like', '%' . $request->input('plan_name') . '%');
        }

        if ($request->has('card_no') && !empty($request->get('card_no'))) {
            $users->where('users.card_no', 'like', '%' . $request->input('card_no') . '%');
        }

        if ($request->has('search_date') && !empty($request->get('search_date'))) {
            $from = $request->get('search_date') . " 00:00:00";
            $to = $request->get('search_date') . " 23:59:59";
            $users->whereBetween('users.created_at', [$from, $to]);
        }
        $users->where('users.status', '!=', '0')->orderBy('id', 'desc');
        $qr_codes = $users->paginate($perPage);
        return view('admin.pages.canopy.qr_code_report', compact('qr_codes'));
    }

    public function downloadZip()
    {
        $users = MainUser::where('status', 1)->get();
        $qrCodes = [];

        foreach ($users as $qr) {
            $imagePath = $qr->qr_path;
            $qrCodes[] = $imagePath;
        }
        // dd($qrCodes);
        $ranfName = uniqid();
        $fileName = public_path('/' . date('Ymd') . '-QrCode-' . $ranfName . '.zip');
        $archive_file_name =  $fileName;

        $zip = new ZipArchive();
        //create the file and throw the error if unsuccessful
        if ($zip->open($archive_file_name, ZipArchive::CREATE) !== TRUE) {
            exit("cannot open <$archive_file_name>\n");
        } else {
            $zip->open($archive_file_name, ZipArchive::CREATE);
            //add each files of $file_name array to archive
            foreach ($qrCodes as $files) {
                $zip->addFile(public_path($files), $files);
                //echo $file_path.$files,$files."<br />";
            }
            $zip->close();
            return response()->download($fileName)->deleteFileAfterSend(true);
        }
        // return response()->download($fileName)->deleteFileAfterSend(true);
    }
    
    public function downloadZipCodes()
    {
        $users = MainUser::where('status', 1)->get();
        $qrCodes = [];

        foreach ($users as $qr) {
            $imagePath = $qr->qr_path;
            $qrCodes[] = $imagePath;
        }
        // dd($qrCodes);
        $ranfName = uniqid();
        $fileName = public_path('/' . date('Ymd') . '-QrCode-' . $ranfName . '.zip');
        $archive_file_name =  $fileName;

        $zip = new ZipArchive();
        //create the file and throw the error if unsuccessful
        if ($zip->open($archive_file_name, ZipArchive::CREATE) !== TRUE) {
            exit("cannot open <$archive_file_name>\n");
        } else {
            $zip->open($archive_file_name, ZipArchive::CREATE);
            //add each files of $file_name array to archive
            foreach ($qrCodes as $files) {
                $zip->addFile(public_path($files), $files);
                //echo $file_path.$files,$files."<br />";
            }
            $zip->close();
            return response()->download($fileName)->deleteFileAfterSend(true);
        }
        // return response()->download($fileName)->deleteFileAfterSend(true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $user = MainUser::query()
            ->select('users.*', 'plan_mst.plan_name', 'client_mst.client_name')
            ->join('plan_mst', 'users.plan_id', '=', 'plan_mst.plan_id')
            ->join('client_mst', 'client_mst.client_id', '=', 'plan_mst.client_id')
            ->where('users.uuid', $uuid)->first();


        //  dd($users);       
        return view('admin.pages.canopy.edit_qr_code', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'plan_id' => 'required',
            'dob' => 'required',
            'effective_date' => 'required',
            'termination_date' => 'required'
        ]);

        if ($request->all()) {
            MainUser::where('uuid', $request->uuid)
                ->update([
                    'plan_id' => $request->plan_id,
                    'dob' => date('d-M-y', strtotime($request->dob)),
                    'effective_date' => date('d-M-y', strtotime($request->effective_date)),
                    'terminatiion_date' => date('d-M-y', strtotime($request->termination_date)),
                    'status' => 4,
                    'comment' => 'Manual Update',
                ]);

            return response()->json(['msg' => 'Qr Code updated Successfully...!'], 201);
        } else {
            return response()->json(['msg' => 'Qr Code generated Successfully...!'], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
