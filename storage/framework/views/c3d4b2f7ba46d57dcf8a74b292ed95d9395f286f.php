<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/daterangepicker.css")); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Daftar kehadiran</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
      </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                <div class="card-body">
                    <div class="row center">
                      <form action="<?php echo e(url("/kehadiran")); ?>" method="get">
                        <div class="col">
                          <div class="form-group mb-3">
                            <label>Mulai</label>
                            <input type="text" class="form-control datepicker" name="mulai">
                          </div>                    
                          <div class="form-group">
                            <label>Sampai</label>
                            <input type="text" class="form-control datepicker" name="selesai">
                          </div>      

                          <div class="form-group">
                            <label>Tugas</label>
                            <select name="tugas" id="" class="form-control" name="tugas">
                              <?php $__currentLoopData = $tugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->jabatan); ?>"><?php echo e($item->jabatan); ?></option>    
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>      

                          <div class="form-group">
                            <label>Jam Waktu</label>
                            <select name="waktu" id="" class="form-control" name="waktu">
                              <option value="pagi">Pagi</option>
                              <option value="sore">Sore</option>
                            </select>
                          </div>      
                            <input type="submit" name="action" class="btn btn-primary px-5" value="cari">
                            <input type="submit" name="action" class="btn btn-info px-5" value="cetak">
                        </div>
                      </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Kehadiran </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th class="text-center"> No </th>
                        <th>Nama</th>
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
                          <td> <?php echo e($loop->iteration); ?> </td>
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
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset("assets/daterangepicker.js")); ?>"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/kehadiran/index.blade.php ENDPATH**/ ?>