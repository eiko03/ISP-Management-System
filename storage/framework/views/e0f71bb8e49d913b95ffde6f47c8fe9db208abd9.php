<?php $__env->startSection('head'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar'); ?>

    <li class="nav-item">
        <a class="nav-link" href="/home/qa">Your Answers</a>
        
    </li>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Questions</div>

                    <div class="card-body">
                    <?php$i=0;?>

                            <?php $__currentLoopData = $ans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p>
                                <?
                                $i=$i+1;
                                echo $i ?>
                                <br>

                                <button class="btn btn-secondary" style="width:100%" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <?php echo e($answer->question); ?> ?
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <?php echo e($answer->answer); ?>.
                                </div>
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\phpproj\dap\resources\views//home/qa.blade.php ENDPATH**/ ?>