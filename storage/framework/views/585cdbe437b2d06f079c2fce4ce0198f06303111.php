<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Daftar Kehadiran Hari ini</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="#">Kehadiran</a></div>
        <div class="breadcrumb-item">Sekarang</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Pegawai</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>status kehadiran</th>
                        <th>Foto</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> 1 </td>
                            <td> <?php echo e($item->user->name); ?></td>
                            <td> <?php echo e($item->user->nip); ?></td>
                            <td> Hadir </td>
                            <td>
                                <img alt="image" src="<?php echo e(asset("assets/img/avatar/avatar-5.png")); ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                            </td>
                            <td>Ujung batu</td>
                            <td>Ujung batu</td>                          
                            <td>
                                <a href="<?php echo e(url("/pegawai/show")); ?>" class="btn btn-secondary btn-sm">Detail</a>
                                <a href="<?php echo e(url("/pegawai/$item->id/edit")); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <form action="<?php echo e(url("pegawai/$item->id")); ?>" method="post" class="d-inline">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field("DELETE"); ?>
                                  <button type="submit" class="btn btn-danger btn-sm"> Hapus </button>
                                </form>
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
    <script src="<?php echo e(asset("assets/js/page/modules-datatables.js")); ?>"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/kehadiran/hari_ini.blade.php ENDPATH**/ ?>