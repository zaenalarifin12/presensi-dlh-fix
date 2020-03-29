<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/daterangepicker.css")); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Kehadiran</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item">kehadiran</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Kehadiran </h4>
            </div>
            <div class="card-body">


              <div class="d-flex justify-content-center">
                <a href="<?php echo e(url("/kehadiran/terkini")); ?>" class="btn btn-block btn-outline-success btn-sm">Kembali ke daftar</a>
              </div>

              <div class="d-flex justify-content-between mt-2">
                <?php if($next == null): ?>
                  <a href="<?php echo e(url("/kehadiran/terkini/$previous")); ?>" class="btn btn-outline-primary btn-sm">Sebelumnya</a>
                  <span></span>
                <?php elseif($previous == null): ?>
                  <span></span>
                  <a href="<?php echo e(url("/kehadiran/terkini/$next")); ?>" class="btn btn-outline-primary btn-sm">Selanjutnya</a>
                <?php else: ?>
                  <a href="<?php echo e(url("/kehadiran/terkini/$previous")); ?>" class="btn btn-outline-primary btn-sm">Sebelumnya</a>
                  <a href="<?php echo e(url("/kehadiran/terkini/$next")); ?>" class="btn btn-outline-primary btn-sm">Selanjutnya</a>
                <?php endif; ?>
              </div>

              <div class="d-flex justify-content-center">
                <p class="lead"><?php echo e($kehadiran->user->name); ?></p>
              </div>
              <div class="d-flex justify-content-center my-1">
                <p class="lead"><?php echo e($kehadiran->user->jabatan); ?></p>
              </div>
              <div class="d-flex justify-content-center my-1">
                <p class="lead"><?php echo e($kehadiran->time); ?></p>
              </div>
                            
              <div class="d-flex justify-content-center my-1">
                <img src="<?php echo e(asset("/storage/presensi/$kehadiran->image")); ?>" class="w-75" height="auto" alt="">
              </div>
              <div class="d-flex justify-content-center my-1 ">
                <p class="lead">Lokasi : <?php echo e($kehadiran->lokasi); ?></p>
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
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/kehadiran/show.blade.php ENDPATH**/ ?>