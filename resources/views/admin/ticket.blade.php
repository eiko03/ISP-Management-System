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
    <li class="nav-item">
        <a class="nav-link" href="/admin/ticket">Tickets</a>
    </li>


@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Tickets</div>

                    <div class="card-body">
                        <table class="table table-hover">

                            @foreach($all as $a)
                                <tr><td>
                                        {{$a->question}}

                                    </td>
                                    <td>
                                        {{$a->email}}

                                    </td>
                                </tr>

                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
