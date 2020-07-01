
  <table>
    <thead>
      <tr>
        <th colspan="14" style="text-align:center">Daftar Hadir Tenaga Kebersihan Pantai</th>
      </tr>
      <tr>
        <th colspan="14" style="text-align:center">Kegiatan Pengelola Kebersihan Pantai</th>
      </tr>
      <tr>
        <th colspan="14" style="text-align:center">Tahun Anggaran {{ date("Y" ,strtotime($mulai)) }}</th>
      </tr>
      <tr>
        <th></th>
      </tr>
      <tr>
        <th colspan="2" style="">Waktu</th>
        <th colspan="3" style="">{{$waktu}}</th>
      </tr>
      <tr>
        <th colspan="2" style="">Mulai Tanggal</th>
        
        <th colspan="3" style="">{{ \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($mulai))) }}</th>
      </tr>
      <tr>
        <th colspan="2" style="">Sampai Tanggal</th>
        <th colspan="3" style="">{{ \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($selesai))) }}</th>
      </tr>

      <tr>
        <th colspan="2" style="">Bagian</th>
        <th colspan="3" style="">{{ $tugas }}</th>
      </tr>

      <tr>
        <th></th>
      </tr>

      <tr>
        <th>Nomor</th>
        <th>Nama</th>
        @php
            $start_date = $mulai;
            $end_date   = $selesai;

            while (strtotime($start_date) <= strtotime($end_date)) {
                $hari = date("D",strtotime($start_date));
                if($hari == "Mon") $hari_indo = "Senin";
                if($hari == "Tue") $hari_indo = "Selasa";
                if($hari == "Wed") $hari_indo = "Rabu";
                if($hari == "Thu") $hari_indo = "Kamis";
                if($hari == "Fri") $hari_indo = "Jum'at";
                if($hari == "Sat") $hari_indo = "Sabtu";
                if($hari == "Sun") $hari_indo = "Ahad";

                echo "<th style='text-align:center'>$hari_indo</th>";
                $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
            }
        @endphp   
      </tr>

      <tr>
        <th></th>
        <th></th>
        
        @php
            $start_date = $mulai;
            $end_date   = $selesai;
        
            while (strtotime($start_date) <= strtotime($end_date)):
            @endphp   
                <th> {{ \App\Helper\Helper::tgl_indo( date('Y-m-d', strtotime($start_date))) }} </th>
            @php
                $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
            endwhile;
        @endphp   
      </tr>
    </thead>

    <tbody>
      @foreach($user as $item)
        <tr>
          <td>{{ $loop->iteration }} </td>
          <td>{{ $item->name }}</td>   

          @php
              $start_date = $mulai;
              $end_date   = $selesai;                           
              $mulai_saya = $start_date;
          @endphp

          @foreach ($item->kehadirans as $kehadiran)
              @php
                while (strtotime($mulai_saya) <= strtotime($end_date)):
                  
                  $ts    = strtotime($kehadiran->time);
                  $hasil = date('Y-m-d', $ts);
                  if ($hasil == $mulai_saya):
                      @endphp
                        <td> {{date('H:i:s', strtotime($kehadiran->time))}} </td>
                      @php
                      $mulai_saya = date ("Y-m-d", strtotime("+1 days", strtotime($mulai_saya)));
                      break;
                  endif;
                    echo "<td></td>";
                    $mulai_saya = date ("Y-m-d", strtotime("+1 days", strtotime($mulai_saya)));
                endwhile;
              @endphp   
          @endforeach
        </tr>
      @endforeach

      <tr>

      </tr>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="5" style="text-align:center">Mengetahui</th>
      </tr>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="5" style="text-align:center">Kasi. Kebersihan dan Persampahan</th>
      </tr>
      <tr>

      </tr>
      <tr>

      </tr>
      <tr>

      </tr>
      <tr>

      </tr>

      <tr>

      </tr>

      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="5" style="text-align:center; text-decoration:underline;">LULUT ANDI ARIYANTO,ST</th>
      </tr>
      
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="5" style="text-align:center;">NIP. 19770406 200501 1 008</th>
      </tr>

    </tbody>
  </table>
