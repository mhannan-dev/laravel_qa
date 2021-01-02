@csrf
                        <div class="form-group">
                            <label for="title">Question Title</label>
                            

                            <input type="text" name="title" value="{{ old('title', $question->title ) }}" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">

                            @if ($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif

                        </div>
                        <div class="form-group">

                            <label for="body">Question Body</label>
                            <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body" rows="3"
                                name="body">{{ old('body', $question->body ) }}</textarea>

                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">{{  $buttonText }}</button>