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
            @if(session('message'))
                <div class="alert-success mb-3">{{session('message')}}</div>
                @endif

            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <div class="card-header">User Activation</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                        @foreach($users as $user)
                        <tr>
                            <th><a href="/admin/{{$user->id}}">{{$user->name}}</a></th>
                            <th>{{$user->email}}</th>
                            <th>{{$user->package_id}}</th>
                            <th>@if($user->status==0)Inactive @else Active @endif </th>
                            <th><a href="{{ route('status',['id'=>$user->id]) }}">
                                    @if($user->status==0)Activate @else Deactivate @endif
                                </a> </th>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="form-group">
                        <form action="/admin/static" method="post">
                            @csrf
                            @method('DELETE')
                            <button CLASS="btn btn-danger" type="submit">Delete all Deactivated</button>
                        </form>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
