<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/daterangepicker.css")); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Daftar kehadiran Terkini</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item"><a href="#">Kehadiran</a></div>
        <div class="breadcrumb-item">Terkini</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Kehadiran terkini </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="example">
                  <thead>
                    <th style="width:250px">Gambar</th>
                    <th>Name</th>
                    <th>Jabatan</th>
                    <th>NO THL</th>
                    <th>Waktu</th>
                    <th>Action</th>
                  </thead>
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
      /*
        TODO 
        ubah url ke localhost url()
      */
    $(document).ready( function () {
        $('#example').DataTable({
          order: [ [0, 'desc'] ],
          processing  : true,
          serverSide  : true,
          ajax        : `<?php echo e(url("/kehadiran/terkini/json")); ?>` ,
          columns : [
            { data : "gambar",      name : "gambar"},
            { data : "user.name",   name : "user.name"},
            { data : "user.jabatan", name : "user.jabatan"},
            { data : "user.no_thl", name : "user.no_thl"},
            { data : "time"    ,    name : "time"},
            { data : "action"   ,   name : "action" }
          ]
        });
    } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/kehadiran/terkini.blade.php ENDPATH**/ ?>