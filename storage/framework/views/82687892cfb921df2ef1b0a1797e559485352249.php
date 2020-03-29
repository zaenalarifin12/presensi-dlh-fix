<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
        <h1>Home</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pegawai</h4>
                    </div>
                        <div class="card-body">
                        <?php echo e($count_user); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- Page Specific JS File -->
    <script src="<?php echo e(asset("assets/js/page/index-0.js")); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/index.blade.php ENDPATH**/ ?>