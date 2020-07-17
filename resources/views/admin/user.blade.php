@extends('layouts.app')
@section('navbar')

    <li class="nav-item">
        <a class="nav-link" href="/admin">Users</a>
        {{--                    <div id="section1">--}}
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
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="/admin/ticket">Tickets</a>--}}
{{--    </li>--}}


@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View User</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <tr><th colspan="2">
                                    <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                        <img src="{{asset('/storage/uploads/'.$user->image)}}" class="col-md-10 col-md-12-sm-6 col-xs-6" >
                                    </div>
                                </th> </tr>
                            <tr><th><strong>Name:</strong></th><td>{{$user->name}}</td></tr>
                            <tr><th><strong>Email:</strong></th><td>{{$user->email}}</td></tr>
                            <tr><th><strong>Address:</strong></th><td>{{$user->address}}</td></tr>
                            <tr><th><strong>Phone No:</strong></th><td>{{$user->phone}}</td></tr>
                            <tr><th><strong>Package:</strong></th><td>{{$user->package}}</td></tr>
                            <tr><th><strong>Package Id:</strong></th><td>{{$user->package_id}}</td></tr>
                            <tr><th><strong>Package pass:</strong></th><td>{{$user->package_pass}}</td></tr>
                            <tr><th><strong>Package Speed:</strong></th><td>{{$user->package_speed}} MBps</td></tr>
                            <tr><th><strong>Create Date:</strong></th><td>{{$user->created_at}}</td></tr>
                            <tr><th><strong>Subscription Date:</strong></th><td>{{$user->activated_at}}</td></tr>

                        </table>
                        <form action="/admin" id="delete_form" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$user->id}}">
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


                                        @csrf
                                    <div class="modal-body">
                                            <form  action="/admin" method="post" enctype="multipart/form-data" id="update_form" name="myForm" class="needs-validation">
                                                @csrf



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
                                                    <input type="hidden" name="id" value="{{$user->id}}" required>
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
{{--                                    <div class="modal-footer">--}}

{{--                                    </div>--}}


                                </div>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
