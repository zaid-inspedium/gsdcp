<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//     public function index()
//     {
//     $trm =0;
//     $tm =0;
//     $tl =0;
//     $tp =0;
//     $tsc = 0;
//     $trk = 0;
//     $trd = 0;
//     $sdu = 0;
//     $scu1 = 0;
//     $scu2 = 0;
//     $scu3 = 0;
//     $studs = DB::select(DB::raw("SELECT * FROM stud_certificate
//       INNER JOIN dogs
//       order by stud_certificate.id desc LIMIT 5"));
// //print_r($studs);
//         $today_registor_members = DB::select(DB::raw("SELECT COUNT(id) AS total FROM `users` WHERE DATE(`created_at`)>='2020-01-01 00:00:00'")); // WHERE 1 AND `user_type_id` != 1 AND
// foreach($today_registor_members as $trmval){
//   $trm += $trmval->total;
// }
// $total_members = DB::select(DB::raw("SELECT COUNT(id) AS total FROM `users` WHERE DATE(`created_at`)>='2020-01-01 00:00:00'")); //LEFT JOIN 'user_types' ON
// foreach($total_members as $tmval){
//   $tm += $tmval->total;
// }
// $total_litters = DB::select(DB::raw("SELECT COUNT(id) AS total FROM `litters` WHERE DATE(`created_at`)>='2020-01-01 00:00:00'"));
// foreach($total_litters as $tlval){
//   $tl += $tlval->total;
// }
// $total_puppies = DB::select(DB::raw("SELECT no_of_puppies AS total FROM `litters` WHERE DATE(`created_at`)>='2020-01-01 00:00:00'"));
// foreach($total_puppies as $tpval){
//   $tp += $tpval->total;
// }
// $total_stud_certificates = DB::select(DB::raw("SELECT COUNT(id) AS total FROM `stud_certificate` WHERE DATE(`created_at`)>='2020-01-01 00:00:00'"));
// foreach($total_stud_certificates as $tscval){
//   $tsc += $tscval->total;
// }
//  $total_registered_kennels = DB::select(DB::raw("SELECT COUNT(id) AS total FROM `kennels` WHERE DATE(`created_at`)>='2020-01-01 00:00:00'"));
// foreach($total_registered_kennels as $trkval){
//   $trk += $trkval->total;
// }
//  $total_registered_dogs = DB::select(DB::raw("SELECT COUNT(id) AS total FROM `dogs` WHERE status = 'Active' AND DATE(`created_at`)>='2020-01-01 00:00:00'"));
// foreach($total_registered_dogs as $trdval){
//   $trd += $trdval->total;
// }
// $stud_dogs_used = DB::select(DB::raw("SELECT COUNT(id) AS total FROM `stud_certificate` WHERE status = 'Used' AND DATE(`created_at`)>='2020-01-01 00:00:00'"));
// foreach($stud_dogs_used as $sduval){
//   $sdu += $sduval->total;
// }
// $new_members = DB::select(DB::raw("SELECT * FROM users order by id desc LIMIT 5"));
// $pend = DB::select(DB::raw("SELECT * FROM litters WHERE status = 'Pending' order by id desc LIMIT 5"));
// $sct = DB::select(DB::raw("SELECT COUNT(id) AS total FROM stud_certificate"));
// foreach($sct as $sctval){
//   $scu1 += $sctval->total;
// }
// $scu = DB::select(DB::raw("SELECT COUNT(id) AS total FROM stud_certificate WHERE status = 'Unused'"));
// foreach($scu as $scuval){
//   $scu2 += $scuval->total;
// }
// $scu4 = DB::select(DB::raw("SELECT COUNT(id) AS total FROM stud_certificate WHERE status = 'Used'"));
// foreach($scu4 as $scuval){
//   $scu3 += $scuval->total;
// }
// return view('dashboard/index', ['trm' => $trm, 'tm' => $tm, 'tl' => $tl, 'tp' => $tp, 'tsc' => $tsc, 'trk' => $trk, 'trd' => $trd, 'sdu' => $sdu, 'new_members' => $new_members, 'pend' => $pend, 'scu2' => $scu2, 'scu1' => $scu1, 'scu3' => $scu3, 'studs' => $studs]);
//     }

    public function index(){
        return view('dashboard/index');
    }

}
