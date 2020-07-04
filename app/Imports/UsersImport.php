<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon;

class UsersImport implements ToCollection, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    /*
    public function model(array $row)
    {
        return new User([
            'no_thl'                        => $row[0],
            'name'                          => $row[1],
            'password'                      => $row[2],
            'role'                          => 1,
            'tmt_pengangkatan_pertama'      => $row[3],
            'tempat_lahir'                  => $row[4],
            'tanggal_lahir'                 => $row[5],
            'tingkat_pendidikan_terakhir'   => $row[6],
            'jurusan_pendidikan_terakhir'   => $row[7],
            'jabatan'                       => $row[8],
            'status_tenaga'                 => $row[9],
            'unit_kerja'                    => $row[10],
            'keterangan'                    => $row[11],
        ]);
    }
    */


    // for count success import and fail import
    private $successImport = 0;
    private $failImport = 0;
    public function getCountSuccessImport()
    {
        return $this->successImport;
    }

    public function getCountFailImport()
    {
        return $this->failImport;
    }

    public function collection(Collection $rows)
    {
        
         $validator = Validator::make($rows->toArray(), [
             '*.no_thl' => 'required',
             '*.name' => 'required',
             '*.password' => 'required',
         ]);
        //  ->validate();
        
        //  if ($validator->fails()) {
        //     return redirect('/pegawai')
        //                 ->withErrors($validator);
        // }
        
        foreach ($rows as $row) {
            
            $user = User::withTrashed()->where("no_thl", $row["no_thl"])->first();
            if($user == null){

                User::create([
                    'no_thl'                        => $row["no_thl"],
                    'name'                          => strtoupper($row['name']),
                    'password'                      => Hash::make($row["password"]),
                    'role'                          => 1,
                    'tmt_pengangkatan_pertama'      => $this->change_format_date($row["tmt_pengangkatan_pertama"]),
                    'tempat_lahir'                  => $row["tempat_lahir"],
                    'tanggal_lahir'                 => $this->change_format_date($row["tanggal_lahir"]),
                    'tingkat_pendidikan_terakhir'   => $row["tingkat_pendidikan_terakhir"],
                    'jurusan_pendidikan_terakhir'   => $row["jurusan_pendidikan_terakhir"],
                    'jabatan'                       => $row["jabatan"],
                    'status_tenaga'                 => $row["status_tenaga"],
                    'unit_kerja'                    => $row["unit_kerja"],
                    'keterangan'                    => $row["keterangan"],
                ]);
                $this->successImport += 1;
            }else{
                $this->failImport += 1;
            }
        }
    }

    private function change_format_date($date)
    {
        return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y-m-d');
    }
}
