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
                    <div class="card-header">View User</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <tr><th colspan="2">
                                    <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                        <img src="<?php echo e(asset('/storage/uploads/'.$user->image)); ?>" class="col-md-10 col-md-12-sm-6 col-xs-6" >
                                    </div>
                                </th> </tr>
                            <tr><th><strong>Name:</strong></th><td><?php echo e($user->name); ?></td></tr>
                            <tr><th><strong>Email:</strong></th><td><?php echo e($user->email); ?></td></tr>
                            <tr><th><strong>Address:</strong></th><td><?php echo e($user->address); ?></td></tr>
                            <tr><th><strong>Phone No:</strong></th><td><?php echo e($user->phone); ?></td></tr>
                            <tr><th><strong>Package:</strong></th><td><?php echo e($user->package); ?></td></tr>
                            <tr><th><strong>Package Id:</strong></th><td><?php echo e($user->package_id); ?></td></tr>
                            <tr><th><strong>Package pass:</strong></th><td><?php echo e($user->package_pass); ?></td></tr>
                            <tr><th><strong>Package Speed:</strong></th><td><?php echo e($user->package_speed); ?> MBps</td></tr>
                            <tr><th><strong>Create Date:</strong></th><td><?php echo e($user->created_at); ?></td></tr>
                            <tr><th><strong>Subscription Date:</strong></th><td><?php echo e($user->activated_at); ?></td></tr>

                        </table>
                        <form action="/admin" id="delete_form" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                            <button type="button" onclick="form_delete()" class="btn btn-danger btn-lg ">Delete User</button>
                        </form>

                        <script type="text/javascript">
                            function form_delete() {

                                document.getElementById("delete_form").submit();

                            }
                        </script>
                        <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal">Edit Package Credentials</button>


                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>


                                        <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                            <form  action="/admin" method="post" enctype="multipart/form-data" id="update_form" name="myForm" class="needs-validation">
                                                <?php echo csrf_field(); ?>



                                                <div class="form-group">
                                                    <label for="validationCustom01">Package</label>
                                                    <input type="text" name="package" id="validationCustom01"  placeholder="Package" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom02">Package ID</label>
                                                    <input type="text" name="package_id" id="validationCustom02"  placeholder="Package ID" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom03">Package Password</label>
                                                    <input type="text" name="package_pass" id="validationCustom03"  placeholder="Package Pass" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="validationCustom04">Speed</label>
                                                    <input type="number" name="package_speed" id="validationCustom04"  placeholder="Package Speed in MBps" class="form-control" required>
                                                    <input type="hidden" name="id" value="<?php echo e($user->id); ?>" required>
                                                </div>
                                                <button type="submit" onclick="form_submit()" class="btn btn-primary" data-dismiss="modal">Submit</button>


                                    </form>


                                        <script type="text/javascript">
                                            function form_submit() {
                                                if (document.myForm.package.value == "" || document.myForm.package_id.value == "" || document.myForm.package_pass.value == "" || document.myForm.package_speed.value == "" )
                                                {
                                                    alert( "Please provide Values!" );
                                                }
                                                else{
                                                    document.getElementById("update_form").submit();
                                                }
                                            }
                                        </script>


                                    </div>





                                </div>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\phpproj\dap\resources\views/admin/user.blade.php ENDPATH**/ ?>