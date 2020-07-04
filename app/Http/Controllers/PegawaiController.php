<?php

namespace App\Http\Controllers;

use App\User;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    public function index()
    {
        $users = User::where("role", 1)->get();
        return view("pegawai.index", compact("users"));
    }

    public function create()
    {
        return view("pegawai.create");
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            "no_thl"                        => "required|max:100|unique:users,no_thl",
            "name"                          => "required|max:255",
            "password"                      => "required|min:8"
        ]);
        
        
        // validasi
        $user = User::create([
            "no_thl"                        => $request->no_thl,
            "tmt_pengangkatan_pertama"      => $request->tmt_pengangkatan_pertama,
            "name"                          => $request->name,
            "tempat_lahir"                  => $request->tempat_lahir,
            "tanggal_lahir"                 => $request->tanggal_lahir,
            "tingkat_pendidikan_terakhir"   => $request->tingkat_pendidikan_terakhir,
            "jurusan_pendidikan_terakhir"   => $request->jurusan_pendidikan_terakhir,
            "jabatan"                       => $request->jabatan,
            "status_tenaga"                 => $request->status_tenaga,
            "unit_kerja"                    => $request->unit_kerja,
            "keterangan"                    => $request->keterangan,
            "password"                      => Hash::make($request->password),
        ]);

        return redirect("/pegawai")->with("msg", "Akun Pegawai Berhasil dibuat");
    }

    public function show($id){

        $pegawai = User::where("id", $id)->where("role", 1)->first();

        return view("pegawai.show", compact("pegawai"));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view("pegawai.edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(empty($user)) abort(404);

        // validasi
        if($request->password != null){
            $user->update([
                "no_thl"                        => $request->no_thl,
                "tmt_pengangkatan_pertama"      => $request->tmt_pengangkatan_pertama,
                "name"                          => $request->name,
                "tempat_lahir"                  => $request->tempat_lahir,
                "tanggal_lahir"                 => $request->tanggal_lahir,
                "tingkat_pendidikan_terakhir"   => $request->tingkat_pendidikan_terakhir,
                "jurusan_pendidikan_terakhir"   => $request->jurusan_pendidikan_terakhir,
                "jabatan"                       => $request->jabatan,
                "status_tenaga"                 => $request->status_tenaga,
                "unit_kerja"                    => $request->unit_kerja,
                "keterangan"                    => $request->keterangan,
                "password"                      => Hash::make($request->password)
            ]);
        }else{
            $user->update([
                "no_thl"                        => $request->no_thl,
                "tmt_pengangkatan_pertama"      => $request->tmt_pengangkatan_pertama,
                "name"                          => $request->name,
                "tempat_lahir"                  => $request->tempat_lahir,
                "tanggal_lahir"                 => $request->tanggal_lahir,
                "tingkat_pendidikan_terakhir"   => $request->tingkat_pendidikan_terakhir,
                "jurusan_pendidikan_terakhir"   => $request->jurusan_pendidikan_terakhir,
                "jabatan"                       => $request->jabatan,
                "status_tenaga"                 => $request->status_tenaga,
                "unit_kerja"                    => $request->unit_kerja,
                "keterangan"                    => $request->keterangan
            ]);
        }
        
        return redirect("/pegawai")->with("msg", $request->nama . " sudah terupdate");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect("/pegawai")->with("msg", "Pegawai berhasil di hapus");
    }

    // ===============  IMPORT USER VIA EXCEL
    public function import(Request $request)
    {
        
        $this->validate($request, [
            "file" => "required|mimes:xlsx, xls"
        ]);

        $file = $request->file('file');

        $nama_file = rand().$file->getClientOriginalName();
        
        $file->move("file_pegawai", $nama_file);
        $import = new UsersImport;
        Excel::import($import, public_path("/file_pegawai/". $nama_file));

        $image_path = public_path() . "/file_pegawai/$nama_file";
        File::delete($image_path);

        return redirect("/pegawai")
            ->with("msg", "Data pegawai " . $import->getCountSuccessImport() . " berhasil di import")
            ->with("err", "Data pegawai " . $import->getCountFailImport() . " sudah ada didaftar");;
    }
}
