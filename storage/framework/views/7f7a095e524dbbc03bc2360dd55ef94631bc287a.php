
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      table, th, td {
        padding: 5px;
        border: 1px solid black;
      }
    </style>
</head>
<body>

    <div class="section-body">
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
                          <?php $__currentLoopData = $item->kehadirans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kehadiran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(empty($kehadiran->time)): ?>
                              <td>Tidak hadir</td>  
                            <?php else: ?>
                              <td class="table-success"><?php echo e($kehadiran->time); ?></td>    
                            <?php endif; ?>
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
</body>
</html><?php /**PATH /home/zaenal-ar/Project/absen/resources/views/cetak/index.blade.php ENDPATH**/ ?>