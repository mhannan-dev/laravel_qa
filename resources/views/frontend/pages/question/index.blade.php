@extends('frontend.layout.main')

@section('content')
<div class="row g-0 justify-content-center">
            <div class="col-md-8 align-self-center">
                <div class="card">
                    <div class="card-header text-center">
                       <h4> All question</h1>

                    </div>
                    <div class="card-body">
                        @foreach ($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters mr-2 text-center">
                                    <div class="vote">
                                        <strong>{{ $question->votes }}</strong><br>
                                        {{ Illuminate\Support\Str::plural('vote', $question->votes)}}
                                    </div>

                                    <div class="answer">
                                        <strong>{{ $question->answers }}</strong><br>
                                        {{ Illuminate\Support\Str::plural('answer', $question->answers)}}
                                        
                                    </div>

                                     <div class="view">
                                        <strong>{{ $question->views }}</strong><br>
                                        {{Illuminate\Support\Str::plural('view', $question->views)}}
                                        
                                    </div>



                                </div> 
                                <div class="media-body">
                                    <h5 class="mt-0 text-dark"><a href="{{ $question->url }}{{ route('questions.show',$question->id )}}">{{ $question->title }}</a></h3>
                                    <p class="lead">
                                      Ask by <a href="">{{ $question->user->name }}</a>
                                      <small>{{ $question->created_at }}</small>
                                    </p>

                                    {{ \Illuminate\Support\Str::limit($question->body, 150) }}
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <div class="mx-auto">
                          {{ $questions->links()}}
                        </div>

                    </div>
                </div>
            </div>

        </div>

@endsection
