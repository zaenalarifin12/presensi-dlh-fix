<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table("users")->where("no_thl", "99")->orWhere("no_thl", "11")->first();
        if($user == null){
            DB::table("users")->insert([
                [
                    'name'                          => "Admin",
                    'no_thl'                        => "99",
                    'password'                      => Hash::make("11111111"),
                    "role"                          => "3",
                    "tmt_pengangkatan_pertama"      => '1979-02-11',
                    "tempat_lahir"                  => "JEPARA",
                    "tanggal_lahir"                 => "1979-02-11",
                    "tingkat_pendidikan_terakhir"   => "SLTA",
                    "jurusan_pendidikan_terakhir"   => "MANAGEMENT INFORMATIKA",
                    "jabatan"                       => "TENAGA KEBERSIHAN",
                    "status_tenaga"                 => "THL",
                    "unit_kerja"                    => "DLH",
                    "keterangan"                    => "."
                ],
                [
                    'name'                          => "Kepala",
                    'no_thl'                        => "11",
                    'password'                      => Hash::make("11111111"),
                    "role"                          => "2",
                    "tmt_pengangkatan_pertama"      => '1979-02-11',
                    "tempat_lahir"                  => "JEPARA",
                    "tanggal_lahir"                 => "1979-02-11",
                    "tingkat_pendidikan_terakhir"   => "SLTA",
                    "jurusan_pendidikan_terakhir"   => "MANAGEMENT INFORMATIKA",
                    "jabatan"                       => "TENAGA KEBERSIHAN",
                    "status_tenaga"                 => "THL",
                    "unit_kerja"                    => "DLH",
                    "keterangan"                    => "."
                ]
            ]);
        }
        //     [
        //         'name'                          => "Caex",
        //         'no_thl'                        => "837",
        //         'password'                      => Hash::make("11111111"),
        //         "role"                          => "1",
        //         "tmt_pengangkatan_pertama"      => '1979-02-11',
        //         "tempat_lahir"                  => "JEPARA",
        //         "tanggal_lahir"                 => "1979-02-11",
        //         "tingkat_pendidikan_terakhir"   => "SLTA",
        //         "jurusan_pendidikan_terakhir"   => "MANAGEMENT INFORMATIKA",
        //         "jabatan"                       => "TENAGA KEBERSIHAN",
        //         "status_tenaga"                 => "THL",
        //         "unit_kerja"                    => "DLH",
        //         "keterangan"                    => ""
        //     ],
    }
}
