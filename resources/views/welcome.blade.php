@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Bienvenue sur StackOverflow!</h1>
        <p class="lead">Le site de questions et réponses pour les développeurs.</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="{{ route('questions.index') }}" role="button">Parcourir les questions</a>
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Toutes les questions') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($questions as $question)
                                <hr>
                                <li class="d-flex justify-content-between">
                                    <a href="{{route('questions.show',$question)}}" class="text-decoration-none">
                                        {{$question->titre}}
                                    </a>
                                </li>

                                <li class="d-flex">
                                    <span class="badge bg-success">
                                              {{$question->tag}}
                                    </span>
                                </li>
                                <li class="d-flex">
                                    <p>
                                        {{$question->body}}
                                    </p>
                                </li>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{route('questions.show', $question)}}" class="btn btn-sm btn-primary">Voir</a>
                                </td>
                            @endforeach
                            <hr>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
