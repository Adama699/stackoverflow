<?php
@extends('layouts.app')

@section('content')
    <h1>Liste des questions</h1>
    <ul>
        @foreach ($questions as $question)
            <li><a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a></li>
        @endforeach
    </ul>
@endsection
