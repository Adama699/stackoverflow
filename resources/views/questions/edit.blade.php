
@extends('layouts.app')

@section('content')
    <h1>Editer la question</h1>
    <form action="{{ route('questions.update', $question) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{{ old('title', $question->title) }}" required>
            @error('title')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="body">Question :</label>
            <textarea name="body" id="body" required>{{ old('body', $question->body) }}</textarea>
            @error('body')
            <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="tags">Tags :</label>
            <input type="text" name="tags" id="tags" value="{{ old('tags', $question->tags->pluck('name')->implode(',')) }}">
        </div>
        <button type="submit">Enregistrer</button>
    </form>
@endsection

