@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $answer->content }}</h1>
        <p>By {{ $answer->user->name }}</p>
        <a href="{{ route('answers.edit', [$answer->question, $answer]) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('answers.destroy', [$answer->question, $answer]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
