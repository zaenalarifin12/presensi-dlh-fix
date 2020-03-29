<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Daftar Jadwal</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item">Jadwal</div>
      </div>
    </div>

    <div class="section-body">
      
      <?php if(session("msg")): ?>
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
          <?php echo e(session("msg")); ?>

        </div>
      </div>
      <?php endif; ?>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Jadwal</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th>Hari</th>
                        <th>Jam mulai</th>
                        <th>jam selesai</th>
                        <th>lembur mulai</th>
                        <th>lembur selesai</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td> <?php echo e($loop->iteration); ?> </td>
                          <td> <?php echo e($item->nama_hari); ?></td>
                          <td> <?php echo e($item->jam_mulai ? $item->jam_mulai : "-"); ?></td>
                          <td> <?php echo e($item->jam_selesai ? $item->jam_selesai : "-"); ?></td>
                          <td> <?php echo e($item->lembur_mulai ? $item->lembur_mulai : "-"); ?></td>
                          <td> <?php echo e($item->lembur_selesai ? $item->lembur_selesai : "-"); ?></td>
                          <td> 
                            <?php if($item->status == 1): ?>
                                <p class="text-success"> Masuk </p>
                            <?php else: ?>
                                <p class="text-danger">  Libur </p>
                            <?php endif; ?>
                            </td>
                          <td>
                              <a href="<?php echo e(url("/jadwal/$item->id/edit")); ?>" class="btn btn-primary btn-sm">Edit</a>
                          </td>
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
    <!-- Page Specific JS File -->
    

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/jadwal/index.blade.php ENDPATH**/ ?>