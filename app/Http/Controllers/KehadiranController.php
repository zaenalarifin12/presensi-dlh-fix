<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use PDF;
use App\Exports\KehadiranExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;


class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        $mulai      = urlencode($request->mulai);
        $selesai    = urlencode($request->selesai);
        $waktu      = urlencode($request->waktu);

        $tugas = User::where("role", "=", 1)->get();
        
        if(!empty($mulai) && !empty($selesai) && !empty($waktu)){
            switch ($request->input("action")) {
                case 'cari':
                    if ($waktu == "pagi"){
                        $user = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                            $query->whereBetween("time", [date($mulai." ". "00:00:00"), date($selesai. " "."23:59:59")])->where("status", 0 );
                        }])->where([
                            ["role", 1],
                            ["jabatan", $request->tugas]
                                ])->get();                 
                    }
                    else{
                        $user = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                            $query->whereBetween("time", [date($mulai." ". "00:00:00"), date($selesai. " "."23:59:59")])->where("status", 1 );
                        }])->where([
                            ["role", 1],
                            ["jabatan", $request->tugas]
                                ])->get();                        
                    }

                    // $tugas = $request->tugas;
                    return view("kehadiran.index", compact(["user", "tugas", "mulai", "selesai"]));
                break;            
                case 'cetak':
                    if ($waktu == "pagi"){
                        $waktu = "Pagi";
                        $data = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                            $query->whereBetween("time", [date($mulai." ". "00:00:00"), date($selesai. " "."23:59:59")])->where("status", 0);
                        }])->where([
                            ["role", 1],
                            ["jabatan", $request->tugas]
                                ])->get();                        
                    }
                    else{
                        $waktu = "Sore";
                        $data = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                            $query->whereBetween("time", [date($mulai." ". "00:00:00"), date($selesai. " "."23:59:59")])->where("status", 1);
                        }])->where([
                            ["role", 1],
                            ["jabatan", $request->tugas]
                                ])->get();                        
                    }
                    // $full = $mulai ."sampai" . $selesai;
                    // $pdf = PDF::loadView('cetak.index', compact(["user", "mulai", "selesai"]));
                    // return $pdf->stream("laporan_kehadiran_$full.pdf");
                    $tugas = $request->tugas;
                    return Excel::download(new KehadiranExport($data, $mulai, $selesai, $waktu, $tugas), 'Kehadiran.xlsx');
                break;
            default:
                abort(404);
                break;
            }

        }else{
            $mulai      = date('Y-m-d 00:00:00');
            $selesai    = date('Y-m-d 23:59:59');   

            $user = User::with(["kehadirans" => function($query) use($mulai, $selesai){
                $query->whereBetween("time", [date($mulai), date($selesai)])->where("status", 0 );
            }])->where("role", 1)->get();         
            
            return view("kehadiran.index", compact(["user", "tugas", "mulai", "selesai"]));
        }
        
    }

    public function terkini()
    {
        return view("kehadiran.terkini");
    }

    public function terkini_json()
    {
        $places = Place::with("user")->get();
        
        $datatable = DataTables::of($places)
            ->addColumn("action", function($row){
                return "<a href='/kehadiran/terkini/$row->id' class='btn btn-info'>Lihat</a>";
            })->addColumn("gambar", function($image){
                $imageUrl = URL::to('storage/presensi/') . "/" . $image->image;
                return '<img src="' . $imageUrl .'" style="width:100% !important" />';
            })->rawColumns(["gambar", "action"]);

        return $datatable->make(true);
    }

    /**
     * in view belum
     */
    public function terkini_id($id)
    {
        $kehadiran = Place::with("user")->where("id", $id)->first();

        if(empty($kehadiran)) abort(404);

        $previous = Place::where("id", "<", $kehadiran->id)->max("id");
        
        $next     = Place::where("id", ">", $kehadiran->id)->min("id");

        return view("kehadiran.show", compact("kehadiran", "previous", "next"));
    }

}
