
  <table>
    <thead>
      <tr>
        <th colspan="14" style="text-align:center">Daftar Hadir Tenaga Kebersihan Pantai</th>
      </tr>
      <tr>
        <th colspan="14" style="text-align:center">Kegiatan Pengelola Kebersihan Pantai</th>
      </tr>
      <tr>
        <th colspan="14" style="text-align:center">Tahun Anggaran <?php echo e(date("Y" ,strtotime($mulai))); ?></th>
      </tr>
      <tr>
        <th></th>
      </tr>
      <tr>
        <th colspan="2" style="">Waktu</th>
        <th colspan="3" style="">: <?php echo e($waktu); ?></th>
      </tr>
      <tr>
        <th colspan="2" style="">Mulai Tanggal</th>
        <th colspan="3" style=""><?php echo e(date("d - m - Y", strtotime($mulai))); ?></th>
      </tr>
      <tr>
        <th colspan="2" style="">Sampai Tanggal</th>
        <th colspan="3" style=""><?php echo e(date("d - m - Y", strtotime($selesai))); ?></th>
      </tr>

      <tr>
        <th colspan="2" style="">Bagian</th>
        <th colspan="3" style=""><?php echo e($tugas); ?></th>
      </tr>

      <tr>
        <th></th>
      </tr>

      <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <?php
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
        ?>   
      </tr>

      <tr>
        <th></th>
        <th></th>
        <?php
            $start_date = $mulai;
            $end_date   = $selesai;

            while (strtotime($start_date) <= strtotime($end_date)) {
                echo "<th>$start_date</th>";
                $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
            }
        ?>   
      </tr>
    </thead>

    <tbody>
      <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($loop->iteration); ?> </td>
          <td><?php echo e($item->name); ?></td>   

          <?php
              $start_date = $mulai;
              $end_date   = $selesai;                           
              $mulai_saya = $start_date;
          ?>

          <?php $__currentLoopData = $item->kehadirans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kehadiran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                while (strtotime($mulai_saya) <= strtotime($end_date)) {
                  
                  $ts    = strtotime($kehadiran->time);
                  $hasil = date('Y-m-d', $ts);
                  if ($hasil == $mulai_saya){
                    echo "<td>$kehadiran->time</td>";
                    $mulai_saya = date ("Y-m-d", strtotime("+1 days", strtotime($mulai_saya)));
                    break;
                  }
                    echo "<td></td>";
                    $mulai_saya = date ("Y-m-d", strtotime("+1 days", strtotime($mulai_saya)));
                }
              ?>   
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /**PATH /home/zaenal-ar/Project/absen/resources/views/export/xml.blade.php ENDPATH**/ ?>