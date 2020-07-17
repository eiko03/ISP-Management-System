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
                    <div class="card-header">View Statistics</div>

                    <div class="card-body">
                        <div class="card-header">User Statistics</div>
                        <table class="table table-hover">
                            <tr>
                                <th>
                                    <strong>Total Users:</strong>
                                </th>
                                <td>
                                    <?php echo e($a); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <strong>Active Users:</strong>
                                </th>
                                <td>
                                    <?php echo e($b); ?>

                                </td>
                            </tr>
                        </table>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\phpproj\dap\resources\views/admin/static.blade.php ENDPATH**/ ?>