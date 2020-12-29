@extends('frontend.layout.main')

@section('content')
<div class="row g-0 justify-content-center">
            <div class="col-md-8 align-self-center">
                <div class="card">
                    <div class="card-header">
                        All question

                    </div>
                    <div class="card-body">
                        @foreach ($questions as $question)
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mt-0"><a href="{{ $question->url }}{{ route('questions.show',$question->id )}}">{{ $question->title }}</a></h3>
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
