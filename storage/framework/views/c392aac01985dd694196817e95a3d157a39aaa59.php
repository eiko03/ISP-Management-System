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
            <?php if(session('message')): ?>
                <div class="alert-success mb-3"><?php echo e(session('message')); ?></div>
                <?php endif; ?>

            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <div class="card-header">User Activation</div>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div id="#Activate">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td> <strong>Name</strong> </td>
                            <td> <strong>Email</strong> </td>
                            <td> <strong>Username</strong> </td>
                            <td> <strong>Status</strong> </td>
                            <td> <strong>Action</strong> </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><a href="/admin/<?php echo e($user->id); ?>"><?php echo e($user->name); ?></a></th>
                            <th><?php echo e($user->email); ?></th>
                            <th><?php echo e($user->package_id); ?></th>
                            <th><?php if($user->status==0): ?>Inactive <?php else: ?> Active <?php endif; ?> </th>
                            <th><a href="<?php echo e(route('status',['id'=>$user->id])); ?>">
                                    <?php if($user->status==0): ?>Activate <?php else: ?> Deactivate <?php endif; ?>
                                </a> </th>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    </div>
                    <div class="form-group">
                        <form action="/admin/static" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button CLASS="btn btn-danger" type="submit">Delete all Deactivated</button>
                        </form>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\phpproj\dap\resources\views/admin.blade.php ENDPATH**/ ?>