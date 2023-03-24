@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <div class="d-flex">
            <a class="ms-auto btn btn-primary btn-lg" href="{{ route('questions.create') }}" role="button">Poser une question</a>
        </div>

        <h1>Liste des questions</h1>
        {{ $questions }}
    </div>
@endsection
