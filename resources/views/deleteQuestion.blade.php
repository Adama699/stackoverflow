<?php
@extends('layouts.app')

@section('content')
    <h1>Supprimer la question</h1>
    <p>Êtes-vous sûr de vouloir supprimer cette question ?</p>
    <p>{{ $question->title }}</p>
    <form action="{{ route('questions.destroy', $question) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endsection

