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
                    <div class="card-header">All Unanswered Questions</div>

                    <div class="card-body">
                        <table class="table table-hover">

                        @foreach($ques as $question)
                        <tr><td>
                            <a href="/admin/question/{{$question->id}}">{{$question->question}}</a>

{{--                        <form class="form-group" method="post" action="/admin/question" >--}}
{{--                            @CSRF--}}
{{--                            <input type="text" class="form-control col-md-10 mr-2" name="answer" id="question" autocomplete="off" placeholder="Your Answer" required>--}}
{{--                            <button type="submit" class="btn btn-primary my-1" >Submit</button>--}}
{{--                        </form>--}}
                            </td></tr>

                        @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
