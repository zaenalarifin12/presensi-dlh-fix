<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


    // ======================= for remove image

    // aku ingin menghapus foto kehadiran dibulan lalu (sebelum bulan ini[1bulan])
    // cara menghandle jika ada foto yang belum ke hapus

    // cara pertama sangat bisa tapi apakah querynya akan lemot?
    // tapi caranya gimana supaya langkah kedua itu bisa dihilangkan
    
    // pesudocode
    /**
     * 1. pilih kehadrian yang < [bulan] ini
     * 
     */

    // $kehadiran = Place::where("id", $id)->first();

    // if(empty($spop))    return abort(403);
    // elseif(empty($gambar))  return abort(403);
    // else{
    //     $image_path = public_path() . "/storage/presensi/$gambar->nama";  // Value is not URL but directory file path
    //     if(File::exists($image_path)) {
    //         File::delete($image_path);
    //     }
    //     $gambar->delete();
    //     return redirect()->back()->with("msg", "gambar berhasil di hapus");
    // }
}
