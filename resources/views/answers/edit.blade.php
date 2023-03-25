@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Answer</h1>
        <form action="{{ route('answers.update', [$question, $answer]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5">{{ old('content', $answer->content) }}</textarea>
                @error('content')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
