@extends('frontend.layout.main')

@section('content')
    <div class="row g-0 justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2 class="text-muted"> All question</h1>

                            <div class="ml-auto ">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>

                            </div>

                    </div>


                </div>
                <div class="card-body">
                    @include('frontend.layout._messages')
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters mr-2 text-center">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong><br>
                                    {{ Illuminate\Support\Str::plural('vote', $question->votes) }}
                                </div>

                                <div class="answer">
                                    <strong>{{ $question->answers }}</strong><br>
                                    {{ Illuminate\Support\Str::plural('answer', $question->answers) }}

                                </div>

                                <div class="view">
                                    <strong>{{ $question->views }}</strong><br>
                                    {{ Illuminate\Support\Str::plural('view', $question->views) }}

                                </div>



                            </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h2 class="mt-0 text-dark"> </h2>

                                    <a href="{{ route('questions.show', $question->slug) }}">{{ $question->title }}</a>

                                    <div class="ml-auto">
                                        @if (Auth::user()->can('update', $question))
                                            <a href="{{ route('questions.edit', $question->id) }}"
                                                class="btn btn-outline-secondary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif

                                        @if (Auth::user()->can('delete', $question))
                                            <form class="form-delete" method="post"
                                                action="{{ route('questions.destroy', $question->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i>
                                        @endif


                                        </button>
                                        </form>
                                    </div>
                                </div>
                                <p>
                                    Ask by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>

                                    <small class="text-muted">

                                        {{ $question->created_date }}
                                    </small>
                                </p>

                                {{ \Illuminate\Support\Str::limit($question->body, 150) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="mx-auto">
                        {{ $questions->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
