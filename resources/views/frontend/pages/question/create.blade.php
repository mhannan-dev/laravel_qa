@extends('frontend.layout.main')

@section('content')
    <div class="row g-0 justify-content-center">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2 class="text-muted">Ask Question</h1>
                            <div class="ml-auto ">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back</a>
                            </div>
                    </div>


                </div>
                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post">
                        @include('frontend.pages._form', ['buttonText' => 'Ask The Question'])
                    </form>


                </div>


            </div>
        </div>

    </div>




@endsection
