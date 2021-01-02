@extends('frontend.layout.main')

@section('content')
    <div class="row g-0 justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2 class="text-muted">{{ $page_title }}</h1>
                            <div class="ml-auto ">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back</a>
                            </div>
                    </div>


                </div>
                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Question Title</label>
                            

                            <input type="text" name="title" value="{{ old('title') }}" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">

                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif

                        </div>
                        <div class="form-group">

                            <label for="body">Question Body</label>
                            <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body" rows="3"
                                name="body"></textarea>

                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-default">Ask this Question</button>
                    </form>


                </div>


            </div>
        </div>

    </div>




@endsection
