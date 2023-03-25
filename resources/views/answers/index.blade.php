@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Answers</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Content</th>
                <th>User</th>
                <th>Question</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($answers as $answer)
                <tr>
                    <td>{{ $answer->content }}</td>
                    <td>{{ $answer->user->name }}</td>
                    <td>{{ $answer->question->title }}</td>
                    <td>
                        <a href="{{ route('answers.edit', [$answer->question, $answer]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('answers.destroy', [$answer->question, $answer]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
