<?php $__env->startSection('navbar'); ?>

    <li class="nav-item">
        <a class="nav-link" href="/admin">Users</a>
        
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/announcement">Announcements</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/question">Questions</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/static">Statistics</a>
    </li>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Unanswered Questions</div>

                    <div class="card-body">
                        <table class="table table-hover">

                        <?php $__currentLoopData = $ques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr><td>
                            <a href="/admin/question/<?php echo e($question->id); ?>"><?php echo e($question->question); ?></a>






                            </td></tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\phpproj\dap\resources\views/admin/question.blade.php ENDPATH**/ ?>