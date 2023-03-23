<?php
@extends('layouts.app')

@section('content')
    <h1>Poser une question</h1>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="body">Question :</label>
            <textarea name="body" id="body" required>{{ old('body') }}</textarea>
            @error('body')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="tags">Tags :</label>
            <input type="text" name="tags" id="tags" value="{{ old('tags') }}">
        </div>
        <button type="submit">Poser la question</button>
    </form>
@endsection

