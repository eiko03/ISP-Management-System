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
                    <div class="card-header">Answer Question</div>

                    <div class="card-body">



                        <form class="form-group" method="post" action="/admin/question/" >
                            <?php echo csrf_field(); ?>
                            <input type="text" class="form-control col-md-10 mr-2" name="answer" id="question" autocomplete="off" placeholder="Your Answer" required>
                            <input type="hidden" name="id" value="<?php echo e($id); ?>"  required>
                            <button type="submit" class="btn btn-primary my-1" >Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\phpproj\dap\resources\views/admin/questionsingle.blade.php ENDPATH**/ ?>