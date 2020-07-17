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
                    <div class="card-header">View Statistics</div>

                    <div class="card-body">
                        <div class="card-header">User Statistics</div>
                        <table class="table table-hover">
                            <tr>
                                <th>
                                    <strong>Total Users:</strong>
                                </th>
                                <td>
                                    {{$users}}
                                </td>
                            </tr>
                            <tr><th><strong>Active Users:</strong></th><td>{{$active}}</td></tr>
                            <tr><th><strong>Total Bandwith:</strong></th><td>{{$bb}} MBps</td></tr>
                            <tr><th><strong>Newsletter Subscribers:</strong></th><td>{{$stat}}</td></tr>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
