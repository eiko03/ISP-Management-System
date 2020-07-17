<?php $__env->startSection('head'); ?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/my.js"></script>
    <script type="text/javascript" src="/js/my2.js"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>

    <li class="nav-item">
        <a class="nav-link" href="/home/qa">Your Answers</a>
        
    </li>











<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container main-section">
        <div class="row">



            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="<?php echo e(asset('/storage/uploads/'.$request->user()->image)); ?>" class="col-md-12 col-md-12-sm-12 col-xs-12" >
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow mt-3">Edit Your Profile</button>

                        </div>


                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="container col-md-10 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1>Mr <strong><?php echo e($small); ?></strong></h1>
                                    <h5><?php echo e($request->user()->type); ?></h5>
                                </div>

                            </div>
                        </div>
                        <div class="container col-md-10">
                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Personal Info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Connection Info</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-2">
                                        <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><strong>Name:</strong></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo e($request->user()->name); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><strong>Email:</strong></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo e($request->user()->email); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><strong>Address:</strong></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo e($request->user()->address); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label><strong>Phone:</strong></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo e($request->user()->phone); ?></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="buzz">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label><strong>Package Id:</strong></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo e($request->user()->package_id); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label><strong>Package Password:</strong></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo e($request->user()->package_pass); ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label><strong>Package Speed:</strong> </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo e($request->user()->package_speed); ?> MBps</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label><strong>Subscription Date:</strong> </label>
                                                </div>
                                                <div class="col-md-6">

                                                    <p><?php echo e($request->user()->activated_at); ?></p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container col-md-10 mt-5">
        <?php $__currentLoopData = $assign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Announcement!</strong> <?php echo e($ass->announcement); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <div class="card ">
                <div class="card-header">
                    <h3 class="justify-content-center">Post Question</h3>
                </div>
                <div class="card-body">
                    <form  name="alert" id="addform" action="/home" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row ml-2 mr-2">
                        <input type="text" class="form-control col-md-10 mr-2" name="question" id="jq" autocomplete="off" placeholder="Your Question" required>



                        <button type="submit"   class="btn btn-primary my-0">Submit</button></div>

                    </form>
                    <script type="text/javascript">
                        $(document).ready(function(){
                           $('#addform').on('submit',function(e){
                               e.preventDefault();
                               $.ajax({
                                   type:"POST",
                                   url:"/home",
                                   data: $('#addform').serialize(),
                                   success:function (response) {
                                       console.log(response)
                                       alertify.alert('Success', 'Question Posted Successfully');
                                       $('#jq').val("");

                                   },
                                   error:function(error){
                                       console.log(error)
                                       alertify.alert('Sorry', 'Question Was Not Posted');
                                   }

                               });
                           });

                        });
                    </script>












                </div>
            </div>

    </div>






    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Edit Personal Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>



                <div class="modal-body">
                    <form action="/home" method="POST" enctype="multipart/form-data" id="update_form" class="needs-validation">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <p for="msj">To change your package details contract your service provider</p>
                        <div class="alert alert-danger">
                            <strong>Warning!</strong> Image must be less than 1mb to be uploaded.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom01">Name</label>
                        <input type="text" name="name" id="validationCustom01"  value="<?php echo e($request->user()->name); ?>" class="form-control" required>
                        <div class="invalid-feedback">
                            Please provide a valid Name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom02">Email</label>
                        <input type="email" name="email" id="validationCustom02" value="<?php echo e($request->user()->email); ?>" class="form-control" required>



                        <span class="error"><p id="email_error"></p></span>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom03">Phone</label>
                        <input type="text" name="phone" id="validationCustom03" value="<?php echo e($request->user()->phone); ?>" class="form-control" required>
                        <div class="invalid-feedback">
                            Please provide a valid Phone No.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Address</label>
                        <input type="text" name="address" id="validationCustom04" value="<?php echo e($request->user()->address); ?>" class="form-control" required>
                        <div class="invalid-feedback">
                            Please provide a valid Address.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Change Image</label>
                        <input type="file" name="image" id="validationCustom05" class="form-control">
                    </div>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"  >Update</button>


                    </form>

                </div>







            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\phpproj\dap\resources\views/home.blade.php ENDPATH**/ ?>