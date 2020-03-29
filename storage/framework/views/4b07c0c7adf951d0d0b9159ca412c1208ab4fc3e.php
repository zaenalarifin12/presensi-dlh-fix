<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Lihat Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Home</a></div>
        <div class="breadcrumb-item"><a href="#">Profil</a></div>
        <div class="breadcrumb-item"><?php echo e($pegawai->name); ?></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Profil pegawai <?php echo e($pegawai->name); ?></h4>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="nama">No THL berdasarkan TMT</label>
                            <input disabled id="nama" type="text" class="form-control" value="<?php echo e($pegawai->no_thl); ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="nip">TMT pengangkatan Pertama</label>
                            <input disabled id="nip" type="date" class="form-control" value="<?php echo e($pegawai->tmt_pengangkatan_pertama); ?>">
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>Nama</label>
                          <input disabled type="text" class="form-control" value="<?php echo e($pegawai->name); ?>">
                      </div>
                      <div class="form-group col-6">
                          <label>Tempat lahir</label>
                          <input disabled type="text" class="form-control" value="<?php echo e($pegawai->tempat_lahir); ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>tanggal lahir</label>
                          <input disabled type="date" class="form-control" value="<?php echo e($pegawai->tanggal_lahir); ?>">
                      </div>
                      <div class="form-group col-6">
                          <label>tingkat pendidikan terkahir</label>
                          <input disabled type="text" class="form-control" value="<?php echo e($pegawai->tingkat_pendidikan_terakhir); ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>Jurusan pendidikan terakhir</label>
                          <input disabled type="text" class="form-control" value="<?php echo e($pegawai->jurusan_pendidikan_terakhir); ?>">
                      </div>
                      <div class="form-group col-6">
                          <label>jabatan/tugas yang dilaksanakan</label>
                          <input disabled type="text" class="form-control" value="<?php echo e($pegawai->jabatan); ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>status tenaga non PNS dan NON PPPK</label>
                          <input disabled type="text" class="form-control" value="<?php echo e($pegawai->status_tenaga); ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>Unit kerja</label>
                          <input disabled type="text" class="form-control" value="<?php echo e($pegawai->unit_kerja); ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                          <label>keterangan</label>
                          <input disabled type="text" class="form-control" value="<?php echo e($pegawai->keterangan); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                    <a href="<?php echo e(url("/pegawai")); ?>" class="btn btn-lg btn-block btn-outline-primary">
                        Kembali
                    </a>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/pegawai/show.blade.php ENDPATH**/ ?>