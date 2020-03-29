<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
      <h1>Buat Akun Pegawai</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Data Pegawai</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="<?php echo e(url("pegawai/$user->id")); ?>">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="nama">No THL berdasarkan TMT</label>
                        <input id="nama" type="text" class="form-control" name="no_thl" value="<?php echo e(old("no_thl") ? old("no_thl") : $user->no_thl); ?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="nip">TMT pengangkatan Pertama</label>
                        <input id="nip" type="date" class="form-control" name="tmt_pengangkatan_pertama" value="<?php echo e(old("tmt_pengangkatan_pertama") ? old("tmt_pengangkatan_pertama") : $user->tmt_pengangkatan_pertama); ?>">
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="name" value="<?php echo e(old("name") ? old("name") : $user->name); ?>">
                  </div>
                  <div class="form-group col-6">
                      <label>Tempat lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" value="<?php echo e(old("tempat_lahir") ? old("tempat_lahir") : $user->tempat_lahir); ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>tanggal lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo e(old("tanggal_lahir") ? old("tanggal_lahir") : $user->tanggal_lahir); ?>">
                  </div>
                  <div class="form-group col-6">
                      <label>tingkat pendidikan terkahir</label>
                      <input type="text" class="form-control" name="tingkat_pendidikan_terakhir" value="<?php echo e(old("tingkat_pendidikan_terakhir") ? old("tingkat_pendidikan_terakhir") : $user->tingkat_pendidikan_terakhir); ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>Jurusan pendidikan terakhir</label>
                      <input type="text" class="form-control" name="jurusan_pendidikan_terakhir" value="<?php echo e(old("jurusan_pendidikan_terakhir") ? old("jurusan_pendidikan_terakhir") : $user->jurusan_pendidikan_terakhir); ?>">
                  </div>
                  <div class="form-group col-6">
                      <label>jabatan/tugas yang dilaksanakan</label>
                      <input type="text" class="form-control" name="jabatan" value="<?php echo e(old("jabatan") ? old("jabatan") : $user->jabatan); ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>status tenaga non PNS dan NON PPPK</label>
                      <input type="text" class="form-control" name="status_tenaga" value="<?php echo e(old("status_tenaga") ? old("status_tenaga") : $user->status_tenaga); ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>Unit kerja</label>
                      <input type="text" class="form-control" name="unit_kerja" value="<?php echo e(old("unit_kerja") ? old("unit_kerja") : $user->unit_kerja); ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label>keterangan</label>
                      <input type="text" class="form-control" name="keterangan" value="<?php echo e(old("keterangan") ? old("keterangan") : $user->keterangan); ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-12">
                      <label>Password <span class="text-info">Diisi kalau mau ngedit</span></label>
                      <input type="password" class="form-control" name="password">
                  </div>
                </div>
                <?php echo csrf_field(); ?>
                <?php echo method_field("PUT"); ?>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Edit
                  </button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/pegawai/edit.blade.php ENDPATH**/ ?>