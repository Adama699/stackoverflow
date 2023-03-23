@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Bienvenue sur StackOverflow!</h1>
        <p class="lead">Le site de questions et réponses pour les développeurs.</p>
        <hr class="my-4">
        <p>Recherchez des questions existantes ou posez une nouvelle question pour obtenir de l'aide sur un problème spécifique.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('questions.index') }}" role="button">Parcourir les questions</a>
    </div>
@endsection
