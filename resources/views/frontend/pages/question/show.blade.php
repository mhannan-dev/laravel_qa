@extends('frontend.layout.main')

@section('content')
    <div class="row g-0 justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2 class="text-muted">{{ $question->title }}</h1>

                            <div class="ml-auto ">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>

                            </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="media">

                        <div class="media-body">

                            {{ \Illuminate\Support\Str::limit($question->body, 150) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
