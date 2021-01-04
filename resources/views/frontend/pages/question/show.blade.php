@extends('frontend.layout.main')
@section('content')
    <div class="row g-0 justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="text-success">{{ $question->title }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">

                        <div class="media-body">

                            {{ Str::limit($question->body, 150) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row g-0 justify-content-center mt-5">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-body">

                    <div class="card-title">
                        <h4 class="text-success">
                            {{ $question->answers_count . ' ' . Str::plural('Answer', $question->answers_count) }}
                        </h4>


                    </div>
                    

                    <hr>

                    @foreach ($question->answers as $answer)


                        <div class="media">

                            <div class="media-body">

                                {!! $answer->body_html !!}
                                <div class="float-right">
                                    <span class="text-muted">
                                        Answered {{ $answer->created_date }}
                                        
                                    </span>
                                    <div class="media">
                                        <a href="" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="img-responsive">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>

            </div>
        </div>
    </div>

@endsection
