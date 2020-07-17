@extends('layouts.app')
@section('head')


@endsection
@section('navbar')

    <li class="nav-item">
        <a class="nav-link" href="/home/qa">Your Answers</a>
        {{--                    <div id="section1">--}}
    </li>


@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Questions</div>

                    <div class="card-body">
                    <?php$i=0;?>

                            @foreach($ans as $answer)
                            <p>
                                <?
                                $i=$i+1;
                                echo $i ?>
                                <br>

                                <button class="btn btn-secondary" style="width:100%" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    {{$answer->question}} ?
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    {{$answer->answer}}.
                                </div>
                            </div>

                            @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
