@extends('frontend.layout.main')

@section('content')
<div class="row g-0 justify-content-center">
            <div class="col-md-8 align-self-center">
                <div class="card">
                    <div class="card-header">
                       Question Detail

                    </div>
                    <div class="card-body">

                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mt-0">{{ $question->title }}</a></h3>
                                    <p class="lead">
                                      Ask by <a href="">{{ $question->user->name }}</a>
                                      <small>{{ $question->created_at }}</small>
                                    </p>
                                    {{ $question->body }}

                                </div>
                            </div>
                            <hr>




                    </div>
                </div>
            </div>

        </div>

@endsection
