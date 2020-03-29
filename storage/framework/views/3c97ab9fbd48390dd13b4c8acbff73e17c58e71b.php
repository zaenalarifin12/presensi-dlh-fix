<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset("assets/daterangepicker.css")); ?>">

    <style>
      div.container {
        width: 80%;
    }

    table {
      table-layout: fixed;
      width: 100%; 
      }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Daftar kehadiran Terkini</h1>
      <a href="<?php echo e(url("/kehadiran/terkini")); ?>" class="btn btn-primary">Daftar kehadiran Terkini</a>
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
              <h4>Gambar Daftar Kehadiran terkini </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="col-12 col-sm-6 col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <table class="table table-striped" id="example" style="width:100% !important">
                        <thead>
                          <th>Gambar</th>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
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
          processing  : true,
          serverSide  : true,
          scrollX     : false,
          searching   : false,
          ajax        : `<?php echo e(url("/kehadiran/terkini/image/json")); ?>` ,
          columns : [
            { data:"gambar" , name:"gambar" }
          ],
        });
    } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/kehadiran/terkini_image.blade.php ENDPATH**/ ?>