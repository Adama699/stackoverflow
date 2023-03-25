@extends('layouts.app')

@section('titre')
    {{ $question->titre}} | Help Me
@endsection

@section('content')
    <div class="container" id="app">
        <div class="row my-5 ">
            <vote-component id="{{$question->id}}" votes="{{$question->votes}}"></vote-component>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            {{$question->titre}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            {{$question->body}}
                        </div>
                    </div>



                </div>
                <comment-component
                    question_id="{{$question->id}}"
                    user_id="{{auth()->check() ? auth()->user()->id: null}}"
                    verified_user="{{auth()->check() && auth()->user()->email_verified_at !==null ? true : false }}"
                    validation ="{{auth()->check() && auth()->user()->type == "superviseur"}}"
                >
                </comment-component>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header"><h2>{{ __('Réponses') }}</h2></div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($question->answers as $answer)
                        <hr>
                        <li class="d-flex">
                            <p>
                                {{$answer->content}}
                            </p>
                        </li>
                    @endforeach
                    <hr>
                </ul>
            </div>

        </div>

    </div>

    <div class="container">
        <h1>Votre Réponse</h1>
        <form action="{{ route('answers.store', $question) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5">{{ old('content') }}</textarea>
                @error('content')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            @csrf
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
