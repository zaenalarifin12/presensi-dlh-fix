<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use PDF;
use App\Exports\KehadiranExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Helper\Helper;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        $mulai      = urlencode($request->mulai);
        $selesai    = urlencode($request->selesai);
        $waktu      = urlencode($request->waktu);

        $tugas = User::where("role", "=", 1)->distinct()->get("jabatan");
        
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
                    return view("kehadiran.index", compact(["user", "tugas", "mulai", "selesai"]))->with(["mulai" => $mulai, "selesai" => $selesai, "waktu" => $waktu, "tugas_recent" => $request->tugas ]);
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

            // $user = User::with(["kehadirans" => function($query) use($mulai, $selesai){
            //     $query->whereBetween("time", [date($mulai), date($selesai)])->where("status", 0 );
            // }])->where("role", 1)->get();         
            
            return view("kehadiran.index", compact(["tugas", "mulai", "selesai"]));
        }
        
    }

    public function terkini()
    {
        return view("kehadiran.terkini");
    }

    public function terkini_json()
    {
        $places = Place::with("user")->orderBy("id", "DESC")->get();
        
        $datatable = DataTables::of($places)
            ->addColumn("action", function($row){
                return "<a href='/kehadiran/terkini/$row->id' class='btn btn-info'>Lihat</a>";
            })->addColumn("gambar", function($image){

                if (file_exists( public_path("storage/presensi/$image->image"))){
                    $imageUrl = URL::to('storage/presensi/') . "/" . $image->image;
                }else{
                    $imageUrl = "data:image/png;base64,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";
                }
                return '<img src="' . $imageUrl .'" style="width:100% !important" />';
            })->addColumn("time", function($row){
                $tanggal = Helper::tgl_indo(date('Y-m-d', strtotime($row->time)));
                $jam     = date('H:i:s', strtotime($row->time));
                return $jam . " - " . $tanggal;
            })->rawColumns(["gambar", "action", "time"]);

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
