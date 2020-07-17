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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Make An Announcement</div>

                    <div class="card-body">
                        <form class="needs-validation form-inline " id="ann" method="post" action="/admin/announcement">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="announcement" class="form-control col-md-10 mr-2" id="ann1" placeholder="Your Announcement for 1day" required>



                            <button type="submit" class="btn btn-primary my-1">Submit</button>
                        </form>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#ann').on('submit',function(e){
                                    e.preventDefault();
                                    $.ajax({
                                        type:"POST",
                                        url:"/admin/announcement",
                                        data: $('#ann').serialize(),
                                        success:function (response) {
                                            console.log(response)
                                            alertify.alert('Success', 'Announcement Posted Successfully');
                                            $('#ann1').val("");

                                        },
                                        error:function(error){
                                            console.log(error)
                                            alertify.alert('Sorry', 'Announcement Not Posted ');
                                        }

                                    });
                                });

                            });
                        </script>

                    </div>
                </div>
                <hr>
                <div class="card mt-3">
                    <div class="card-header">Submit to Newsteller</div>

                    <div class="card-body">
                        <form class="needs-validation form-inline " id="news" method="post" action="/admin/announcement/new">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="newsteller"  class="form-control col-md-10 mr-2" id="news1" placeholder="Your News" required>



                            <button type="submit" class="btn btn-primary my-1">Submit</button>
                        </form>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#news').on('submit',function(e){
                                    e.preventDefault();
                                    $.ajax({
                                        type:"POST",
                                        url:"/admin/announcement/new",
                                        data: $('#news').serialize(),
                                        success:function (response) {
                                            console.log(response)
                                            alertify.alert('Success', 'News Mailed Successfully');
                                            $('#news1').val("");

                                        },
                                        error:function(error){
                                            console.log(error)
                                            alertify.alert('Sorry', 'News not mailed');
                                        }

                                    });
                                });

                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\phpproj\dap\resources\views/admin/announcement.blade.php ENDPATH**/ ?>