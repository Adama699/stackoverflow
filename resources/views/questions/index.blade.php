@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <div class="d-flex">
            <a class="ms-auto btn btn-primary btn-lg" href="{{ route('questions.create') }}" role="button">Poser une question</a>
        </div>

            <div class="container">
                <div class="row justify-content-center my-5 ">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">{{ __('Mes Questions') }}</div>

                            <div class="card-body">
                                <table class="table table-hover table-stripped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Tag</th>
                                        <th>Body</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $key => $question)
                                        <tr>
                                            <td>{{$key+=1}}</td>
                                            <td>{{$question->titre}}</td>
                                            <td>
                                          <span class="badge bg-success">
                                              {{$question->tag}}
                                          </span>
                                            <td>{{$question->body}}</td>

                                            </td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <a href="{{route('questions.show', $question)}}" class="btn btn-sm btn-primary">Detail</a>

                                                <a href="{{route('questions.edit', $question)}}" class="btn btn-sm btn-warning mx-2">Editer</a>

                                                <form id="{{$question->id}}" action="{{route('questions.destroy', $question)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="#"
                                                   onclick="if(confirm('Voulez-vous supprimer?')) document.getElementById('{{$question->id}}').submit()"
                                                   class="btn btn-sm btn-danger">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>



    </div>
@endsection
