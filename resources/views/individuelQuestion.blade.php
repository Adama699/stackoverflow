<?php
@extends('layouts.app')

@section('content')
    <h1>{{ $question->title }}</h1>
    <p>{{ $question->body }}</p>
    <p>Posée par {{ $question->user->name }}</p>
    <ul>
        @foreach ($question->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>
@endsection

