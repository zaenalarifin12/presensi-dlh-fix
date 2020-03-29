<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Daftar Pegawai</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
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
              <h4>Daftar Pegawai</h4>
              <a href="<?php echo e(url("pegawai/create")); ?>" class="btn btn-info px-5 pull-right">Tambah</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped hover" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center"> # </th>
                        <th>No THL</th>
                        <th>TMT pengangkatan kerja pertama</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Tingkat Pendidikan Terakhir</th>
                        <th>Jurusan Pendidikan Terakhir</th>
                        <th>Jabatan</th>
                        <th>Status Tenaga</th>
                        <th>unit Kerja</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td> 1 </td>
                          <td> <?php echo e($item->no_thl); ?> </td>
                          <td> <?php echo e($item->tmt_pengangkatan_pertama); ?> </td>
                          <td> <?php echo e($item->name); ?> </td>
                          <td> <?php echo e($item->tempat_lahir); ?> </td>
                          <td> <?php echo e($item->tanggal_lahir); ?> </td>
                          <td> <?php echo e($item->tingkat_pendidikan_terakhir); ?> </td>
                          <td> <?php echo e($item->jurusan_pendidikan_terakhir); ?> </td>
                          <td> <?php echo e($item->jabatan); ?> </td>
                          <td> <?php echo e($item->status_tenaga); ?> </td>
                          <td> <?php echo e($item->unit_kerja); ?> </td>
                          <td> <?php echo e($item->keterangan); ?> </td>
                          <td >
                              <a href="<?php echo e(url("/pegawai/$item->id")); ?>" class="btn btn-secondary btn-sm">Detail</a>
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
    <script src="../assets/js/page/modules-datatables.js"></script>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table-1').DataTable();
    } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/pegawai/index.blade.php ENDPATH**/ ?>